<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\UserAssignmentComment;
use App\Models\UserAssignmentFile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;


class UserAssignment extends Model
{
    // split the column user_id to docent_id and student_id
    protected $fillable = [
        'phase', 
        'progress',
        'assignment_id', 
        'docent_id', 
        'student_answer',
        'student_id', 
        'created_at', 
        'updated_at'
    ]; 

    /**
     * Get the assignment associated with the user assignment.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'id');
    }

    /**
     * Get the user associated with the user assignment.
     */
    // Relation with the user (docent)
    public function docent()
    {
        return $this->belongsTo(User::class, 'docent_id', 'id');
    }

    // Relation with the user (student)
    public function student()
    {
        return $this->BelongsTo(User::class, 'student_id', 'id');
    }
    /* End Mario */

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
