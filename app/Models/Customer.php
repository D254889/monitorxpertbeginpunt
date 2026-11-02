<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'contract_number',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class, 'customer_id', 'customer_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'customer_id', 'customer_id');
    }
}