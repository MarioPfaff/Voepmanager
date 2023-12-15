<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workprocess extends Model
{
    use HasFactory;
    use softDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'workprocesses';
    protected $primaryKey = 'id';

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
        return $this->belongsTo(Core_task::class, 'core_task_id', 'id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }


}
