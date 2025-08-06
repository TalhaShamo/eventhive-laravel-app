<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'date',
        'location',
    ];

    /**
     * Get the user (organizer) that created the event.
     * This defines the inverse of the one-to-many relationship.
     */
    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all the users (attendees) that are registered for this event.
     * This defines the many-to-many relationship.
     */
    public function attendees()
    {
        return $this->belongsToMany(User::class);
    }
}