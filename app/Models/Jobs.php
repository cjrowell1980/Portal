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
    ];

    public function getMachine()
    {
        return $this->belongsTo(Machines::class, 'machine');
    }

    public function getStatus1() // Jobsheet
    {
        return $this->belongsTo(Status::class, 'status_1');
    }

    public function getStatus2() // Invoice In
    {
        return $this->belongsTo(Status::class, 'status_2');
    }

    public function getStatus3() // Photos
    {
        return $this->belongsTo(Status::class, 'status_3');
    }

    public function getStatus4() // Invoice Out
    {
        return $this->belongsTo(Status::class, 'status_4');
    }

}
