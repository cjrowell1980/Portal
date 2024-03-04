<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_1',
        'status_2',
        'status_3',
        'status_4',
    ];

    public function getStatus_1()
    {
        return $this->belongsTo(Status::class, 'status_1');
    }

    public function getStatus_2()
    {
        return $this->belongsTo(Status::class, 'status_2');
    }

    public function getStatus_3()
    {
        return $this->belongsTo(Status::class, 'status_3');
    }

    public function getStatus_4()
    {
        return $this->belongsTo(Status::class, 'status_4');
    }
}
