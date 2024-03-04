<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine',
        'number',
        'fault',
        'address',
        'contactName',
        'contactNo',
        'engineer',
    ];

    public function getMachine()
    {
        return $this->belongsTo(Machines::class, 'machine');
    }

    public function getEngineer()
    {
        return $this->belongsTo(Engineers::class, 'engineer');
    }

    public function getStatus1()
    {
        return $this->belongsTo(Status::class, 'status_1');
    }

    public function getStatus2()
    {
        return $this->belongsTo(Status::class, 'status_2');
    }

    public function getStatus3()
    {
        return $this->belongsTo(Status::class, 'status_3');
    }

    public function getStatus4()
    {
        return $this->belongsTo(Status::class, 'status_4');
    }

}
