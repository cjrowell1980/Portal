<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineers extends Model
{
    use HasFactory;

    protected $fillable = [
        'short',
        'name',
        'email',
        'mobile',
        'invoice',
        'shipping',
    ];

    public function getJobs()
    {
        return $this->hasMany(Jobs::class, 'engineer');
    }
}
