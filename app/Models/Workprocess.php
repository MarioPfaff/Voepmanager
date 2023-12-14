<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workprocess extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'workprocesses';
    protected $primaryKey = 'id';
    use softDeletes;

    protected $fillable = [
        'crebo',
        'core_task_id',
        'workprocess_number',
        'workprocess_title',
    ];

    /**
     * Get the core task that owns the workprocess.
     */
    public function coreTask()
    {
        return $this->belongsTo('App\Models\Core_task', 'core_task_id', 'id');
    }
}
