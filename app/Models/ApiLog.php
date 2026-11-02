<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    protected $table = 'api_logs';
    protected $primaryKey = 'log_id';

    public $timestamps = false;

    protected $fillable = [
        'source',
        'external_id',
        'message',
        'payload',
        'status',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}