<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'field',
        'old',
        'new',
        'user',
        'notes',
        'record',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
