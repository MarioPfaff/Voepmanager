<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserAssignment extends Model
{
    protected $fillable = ['phase', 'progress', 'assignment_id', 'user_id', 'created_at', 'updated_at', ]; 

    /**
     * Get the assignment associated with the user assignment.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the user associated with the user assignment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments associated with the user assignment.
     */
    public function comments()
    {
        return $this->hasMany(UserAssignmentComment::class);
    }

    /**
     * Get the files associated with the user assignment.
     */
    public function files()
    {
        return $this->hasMany(UserAssignmentFile::class);
    }
}
