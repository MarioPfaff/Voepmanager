<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserAssignmentComment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_assignment_id', 'created_at', 'updated_at'];


    /**
     * Get the user assignment associated with the comment.
     */

    public function userAssignment()
    {
        return $this->belongsTo(UserAssignment::class);
    }

    /**
     * Get the user associated with the comment.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
