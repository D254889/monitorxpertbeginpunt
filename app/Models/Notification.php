<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'notification_id';

    public $timestamps = false;

    protected $fillable = [
        'issue_id',
        'customer_id',
        'type',
        'message',
        'status',
        'sent_at',
        'created_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id', 'issue_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}