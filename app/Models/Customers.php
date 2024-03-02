<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'syrinx',
        'notes',
    ];

    public function getMachines()
    {
        return $this->hasMany(Machines::class, 'customer');
    }

    public function getJobs()
    {
        return $this->hasManyThrough(Jobs::class, Machines::class, 'machine', 'customer');
    }
}
