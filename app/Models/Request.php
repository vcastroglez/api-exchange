<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'params' => 'array',
        'headers' => 'array',
        'response' => 'array'
    ];

    public function collection()
    {
        return $this->belongsTo('App\Models\Collection');
    }
}
