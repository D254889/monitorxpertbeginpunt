<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportShare extends Model
{
    protected $table = 'report_shares';
    protected $primaryKey = 'share_id';

    public $timestamps = false;

    protected $fillable = [
        'report_id',
        'shared_by',
        'recipient_email',
        'shared_at',
    ];

    protected $casts = [
        'shared_at' => 'datetime',
    ];

    public function report()
    {
        return $this->belongsTo(ManagementReport::class, 'report_id', 'report_id');
    }

    public function sharer()
    {
        return $this->belongsTo(User::class, 'shared_by', 'user_id');
    }
}