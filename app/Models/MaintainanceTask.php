<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceTask extends Model
{
    protected $table = 'maintenance_tasks';
    protected $primaryKey = 'task_id';

    public $timestamps = false;

    protected $fillable = [
        'plant_id',
        'technician_id',
        'task_type',
        'description',
        'status',
        'priority',
        'scheduled_date',
        'completed_date',
    ];

    protected $casts = [
        'scheduled_date' => 'datetime',
        'completed_date' => 'datetime',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'plant_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id', 'user_id');
    }
}