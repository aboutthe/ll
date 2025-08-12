<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1) Приводим тип колонки к UUID (если нужно)
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'current_team_id')) {
                $table->uuid('current_team_id')->nullable()->change();
            } else {
                $table->uuid('current_team_id')->nullable();
            }
        });

        // 2) Сносим ЛЮБОЙ существующий FK на current_team_id (если он есть)
        $database = DB::getDatabaseName();
        $constraints = DB::select("
            SELECT CONSTRAINT_NAME
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ?
              AND TABLE_NAME = 'users'
              AND COLUMN_NAME = 'current_team_id'
              AND CONSTRAINT_NAME <> 'PRIMARY'
              AND REFERENCED_TABLE_NAME IS NOT NULL
        ", [$database]);

        foreach ($constraints as $c) {
            try {
                DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `{$c->CONSTRAINT_NAME}`");
            } catch (\Throwable $e) {
                // игнорируем — ключ мог быть уже удалён
            }
        }

        // 3) Создаём FK на teams(id), если его ещё нет
        // (teams.id должен быть uuid, а миграция teams — раньше этой)
        Schema::table('users', function (Blueprint $table) {
            // индекс для FK (MySQL сам создаст, но не вредит явно)
            $table->index('current_team_id');

            try {
                $table->foreign('current_team_id')
                      ->references('id')->on('teams')
                      ->nullOnDelete(); // или ->cascadeOnDelete()
            } catch (\Throwable $e) {
                // если FK уже есть — молча пропускаем
            }
        });
    }

    public function down(): void
    {
        // удалить FK (если есть)
        $database = DB::getDatabaseName();
        $constraints = DB::select("
            SELECT CONSTRAINT_NAME
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ?
              AND TABLE_NAME = 'users'
              AND COLUMN_NAME = 'current_team_id'
              AND CONSTRAINT_NAME <> 'PRIMARY'
              AND REFERENCED_TABLE_NAME IS NOT NULL
        ", [$database]);

        foreach ($constraints as $c) {
            try {
                DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `{$c->CONSTRAINT_NAME}`");
            } catch (\Throwable $e) {}
        }

        // (по желанию) можно дропнуть индекс/колонку
        Schema::table('users', function (Blueprint $table) {
            try { $table->dropIndex(['current_team_id']); } catch (\Throwable $e) {}
            // $table->dropColumn('current_team_id'); // если нужно
        });
    }
};
