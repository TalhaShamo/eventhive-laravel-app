<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // <-- Add 'role' here
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the events that this user has organized.
     * This defines the one-to-many relationship.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get all the events that this user is registered for as an attendee.
     * This defines the many-to-many relationship.
     */
    public function registrations()
    {
        return $this->belongsToMany(Event::class);
    }
}