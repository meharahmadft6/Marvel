<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Add this import
use Illuminate\Notifications\Notifiable; // You may also need this trait for notifications
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable // Extend Authenticatable instead of Model
{
    use HasFactory, Notifiable; // Use Notifiable trait for notifications

    // Fillable properties to mass assign
    protected $fillable = ['name', 'email', 'password'];

    // Optionally, define any relationships, casts, etc.
}
