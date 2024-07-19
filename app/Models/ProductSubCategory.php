<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'productsubcategory', 'productcategory_id', 'sub_slug', 'status','title','description','url','services','priority'
        ,'images[]','price','unit',
    ];

   
}

