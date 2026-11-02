<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueType extends Model
{
    protected $table = 'issue_types';
    protected $primaryKey = 'issue_type_id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class, 'issue_type_id', 'issue_type_id');
    }
}