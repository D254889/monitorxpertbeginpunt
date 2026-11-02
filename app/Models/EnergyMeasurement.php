<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnergyMeasurement extends Model
{
    protected $table = 'energy_measurements';
    protected $primaryKey = 'measurement_id';

    public $timestamps = false;

    protected $fillable = [
        'plant_id',
        'measured_at',
        'solar_production',
        'wind_production',
        'biomass_production',
        'temperature',
        'efficiency',
    ];

    protected $casts = [
        'measured_at' => 'datetime',
        'solar_production' => 'decimal:2',
        'wind_production' => 'decimal:2',
        'biomass_production' => 'decimal:2',
        'temperature' => 'decimal:2',
        'efficiency' => 'decimal:2',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'plant_id');
    }
}