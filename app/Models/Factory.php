<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $table = 'factories';
    protected $primaryKey = 'factory_id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'location',
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class, 'factory_id', 'factory_id');
    }
}