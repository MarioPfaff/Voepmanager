<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        return $this->belongsToMany(User::class, 'user_assignment')->using(UserAssignment::class)->withPivot('title' , 'description', 'deadline', 'status');
    }

    public function authors()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
