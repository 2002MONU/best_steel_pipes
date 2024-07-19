<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextDetail extends Model
{
    use HasFactory;
protected  $table = "get_in";
protected $fillable = [
    'phone_01','phone_02','email_01','email_02','call_no','whatsapp',''
];
}
