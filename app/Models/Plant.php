<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'plants';
    protected $primaryKey = 'plant_id';

    public $timestamps = false;

    protected $fillable = [
        'factory_id',
        'name',
        'location',
        'capacity',
        'status',
    ];

    public function factory()
    {
        return $this->belongsTo(Factory::class, 'factory_id', 'factory_id');
    }

    public function issues()
    {
        return $this->hasMany(Issue::class, 'plant_id', 'plant_id');
    }

    public function maintenanceTasks()
    {
        return $this->hasMany(MaintenanceTask::class, 'plant_id', 'plant_id');
    }

    public function energyMeasurements()
    {
        return $this->hasMany(EnergyMeasurement::class, 'plant_id', 'plant_id');
    }

    public function manuals()
    {
        return $this->hasMany(Manual::class, 'plant_id', 'plant_id');
    }
}