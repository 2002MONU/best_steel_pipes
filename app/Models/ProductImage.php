<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id', 'sub_category_id', 'heading','value','status',
    ];

  
    // public function subcategory() {
    //     return $this->belongsTo(ProductSubCategory::class, 'sub_category_id');
    // }

   
   
}
