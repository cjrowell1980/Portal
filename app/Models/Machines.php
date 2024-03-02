<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machines extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock',
        'asset',
        'serial',
        'make',
        'model',
        'yom',
        'customer',
    ];

    public function getCustomer()
    {
        return $this->belongsTo(Customers::class, 'customer');
    }

    public function getJobs()
    {
        return $this->hasMany(Jobs::class, 'machine');
    }

}
