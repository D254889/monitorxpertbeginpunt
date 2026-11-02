<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueUpdate extends Model
{
    protected $table = 'issue_updates';
    protected $primaryKey = 'update_id';

    public $timestamps = false;

    protected $fillable = [
        'issue_id',
        'user_id',
        'old_status',
        'new_status',
        'old_priority',
        'new_priority',
        'comment',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id', 'issue_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}