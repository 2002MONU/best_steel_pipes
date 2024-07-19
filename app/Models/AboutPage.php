<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'maintitle', 'description', 'titleicon1','title1','titleicon2','title2','aboutimage','our_vision','our_mission',
    ];
}
