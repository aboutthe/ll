<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected static $requiredFields = [];

    /*
    // Здесь можешь прописать общую логику
    // Например: глобальные scope, кастомные методы, кэширование и т.д.

    protected $guarded = []; // пример — отключить mass-assignment protection

    // Пример: Глобальный scope для всех моделей
    protected static function booted()
    {
        static::addGlobalScope('active', function ($builder) {
            $builder->where('is_active', true);
        });
    }

    // Пример: общие аксессоры/мутаторы, кастомные методы и т.д.
    */

    // Метод берет статическое свойство из дочернего класса
    public static function getRequiredFields(): array
    {
        return static::$requiredFields;
    }
}
