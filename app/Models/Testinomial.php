<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testinomial extends Model
{
    use HasFactory;

    protected $fillable = [
         'description', 'clientimage','clientname','designation','status',
    ];
}
