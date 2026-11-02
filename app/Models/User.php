<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'phone',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    public function reportedIssues()
    {
        return $this->hasMany(Issue::class, 'reported_by_user_id', 'user_id');
    }

    public function assignedIssues()
    {
        return $this->hasMany(Issue::class, 'assigned_technician_id', 'user_id');
    }

    public function generatedReports()
    {
        return $this->hasMany(ManagementReport::class, 'generated_by', 'user_id');
    }

    public function issueUpdates()
    {
        return $this->hasMany(IssueUpdate::class, 'user_id', 'user_id');
    }

    public function sharedReports()
    {
        return $this->hasMany(ReportShare::class, 'shared_by', 'user_id');
    }

    public function maintenanceTasks()
    {
        return $this->hasMany(MaintenanceTask::class, 'technician_id', 'user_id');
    }
}