<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurAchievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_complete', 'satisfied_client','experienced_staff','award_win','project_icon1','satisfied_icon2','experienced_icon3','award_icon4',
    ];
}
