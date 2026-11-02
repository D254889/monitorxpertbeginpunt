<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';
    protected $primaryKey = 'issue_id';

    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'plant_id',
        'issue_type_id',
        'reported_by_user_id',
        'assigned_technician_id',
        'parent_issue_id',
        'priority',
        'status',
        'source',
        'external_issue_id',
        'description',
        'created_at',
        'updated_at',
        'resolved_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'resolved_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'plant_id');
    }

    public function issueType()
    {
        return $this->belongsTo(IssueType::class, 'issue_type_id', 'issue_type_id');
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reported_by_user_id', 'user_id');
    }

    public function assignedTechnician()
    {
        return $this->belongsTo(User::class, 'assigned_technician_id', 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Issue::class, 'parent_issue_id', 'issue_id');
    }

    public function children()
    {
        return $this->hasMany(Issue::class, 'parent_issue_id', 'issue_id');
    }

    public function updates()
    {
        return $this->hasMany(IssueUpdate::class, 'issue_id', 'issue_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'issue_id', 'issue_id');
    }
}