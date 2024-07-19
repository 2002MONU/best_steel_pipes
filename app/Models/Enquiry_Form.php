<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry_Form extends Model
{
    use HasFactory;
        protected  $table = 'enquiry_form';
        protected $fillable = [
            'full_name','email','mobile_no','message',
        ];
}
