<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'engineer',
        'scheduled',
        'attended',
        'status',
        'report',
        'outcome'
    ];

    public function getJob()
    {
        return $this->belongsTo(Jobs::class, 'job');
    }

    public function getEngineer()
    {
        return $this->belongsTo(Engineers::class, 'engineer');
    }
}
