<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserAssignmentFile extends Model
{
    use HasFactory;

    protected $fillable = ['file_path', 'user_assignment_id', 'created_at', 'updated_at'];

    /**
     * Get the user assignment associated with the file.
     */

    public function userAssignment()
    {
        return $this->belongsTo(UserAssignment::class);
    }

    /**
     * Get the user associated with the file.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
