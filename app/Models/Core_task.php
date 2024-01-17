<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Workprocess;
use Illuminate\Database\Eloquent\SoftDeletes;

class Core_task extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'core_tasks';
    protected $primaryKey = 'id';
    use softDeletes;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the wokrpocesses for the core task.
     */
    public function workprocesses()
    {
        return $this->hasMany(Workprocess::class);
    }
}
