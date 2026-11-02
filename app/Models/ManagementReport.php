<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagementReport extends Model
{
    protected $table = 'management_reports';
    protected $primaryKey = 'report_id';

    public $timestamps = false;

    protected $fillable = [
        'generated_by',
        'title',
        'period_start',
        'period_end',
        'report_data',
        'created_at',
    ];

    protected $casts = [
        'period_start' => 'date',
        'period_end' => 'date',
        'created_at' => 'datetime',
    ];

    public function generator()
    {
        return $this->belongsTo(User::class, 'generated_by', 'user_id');
    }

    public function shares()
    {
        return $this->hasMany(ReportShare::class, 'report_id', 'report_id');
    }
}