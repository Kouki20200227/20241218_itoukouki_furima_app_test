<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['user_id', 'profile_image', 'profile_user_name', 'profile_address', 'profile_post_code', 'profile_building'];

    public static $rules = array(
        'user_id' => 'required',
        'profile_image' => 'required',
        'profile_user_name' => 'required',
        'profile_address' => 'required',
        'profile_post_code' => 'required',
        'profile_building' => 'required',
    );

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}