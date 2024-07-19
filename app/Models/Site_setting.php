<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site_setting extends Model
{
    use HasFactory;
    protected $table = "sitesettings";
    protected $fillable = [
        'title','logo','favicon','footer_about','about_banner','category_banner','gallery_banner','contact_banner','testimonial_image','facebook_link','twitter_link','youtube_link','insta_link','linked_link',''
    ];
}
