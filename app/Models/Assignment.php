<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Workprocess;


class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'deadline',
        ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_assignment')->using(UserAssignment::class)->withPivot('phase', 'progress');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function workprocesses()
    {
        return $this->belongsTo(Workprocess::class, 'workprocess_id');
    }
}
