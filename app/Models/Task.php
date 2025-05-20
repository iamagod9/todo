<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\TaskStatus;

class Task extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'status' => TaskStatus::class
    ];
}
