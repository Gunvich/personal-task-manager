<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'title' => 'Изучить Laravel',
            'description' => 'Разобраться с моделями и миграциями.',
            'is_completed' => false,
        ]);

        Task::create([
            'title' => 'Настроить PostgreSQL',
            'description' => 'Проверить работу базы данных через pgAdmin.',
            'is_completed' => true,
        ]);

        Task::create([
            'title' => 'Создать главную страницу',
            'description' => 'Подготовить интерфейс списка задач.',
            'is_completed' => false,
        ]);
    }
}
