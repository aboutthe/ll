<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $name  = env('ADMIN_NAME', 'Admin User');
            $email = env('ADMIN_EMAIL', 'admin@example.com');
            $pass  = env('ADMIN_PASSWORD', 'password');

            $user = User::query()->firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make($pass),
                    'email_verified_at' => now(),
                ]
            );

            $team = Team::query()->firstOrCreate(
                ['user_id' => $user->id, 'personal_team' => true],
                ['name' => $user->name . "'s Team"]
            );

            if ($user->current_team_id !== $team->id) {
                $user->current_team_id = $team->id;
                $user->save();
            }

            if (! $user->teams()->where('teams.id', $team->id)->exists()) {
                $user->teams()->attach($team->id, ['role' => 'admin']);
            }
        });
    }
}
