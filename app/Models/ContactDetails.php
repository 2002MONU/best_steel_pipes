<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id', 'phone_no_01','phone_no_2','email_01','email_02','address','map_link','status',
    ];
}
