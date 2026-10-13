<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'due_at',
    ];

    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
            'due_at' => 'datetime',
        ];
    }
}
