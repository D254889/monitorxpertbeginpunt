<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    protected $table = 'manuals';
    protected $primaryKey = 'manual_id';

    public $timestamps = false;

    protected $fillable = [
        'plant_id',
        'title',
        'description',
        'document_url',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'plant_id');
    }
}