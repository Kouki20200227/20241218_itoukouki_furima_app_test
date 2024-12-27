<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'profile_image' => 'required',
        'profile_address' => 'required',
        'profile_post_code' => 'required',
        'profile_building' => 'required',
    );
}
