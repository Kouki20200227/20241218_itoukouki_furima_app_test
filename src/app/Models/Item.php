<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Item extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['user_id', 'condition_id', 'item_image', 'item_name', 'item_detail', 'item_buy_flg'];

    public static $rules = array(
        'user_id' => 'required',
        'condition_id' => 'required',
        'item_image' => 'required',
        'item_name' => 'required',
        'item_detail' => 'required',
        'item_buy_flg' => 'required',
    );

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function condition(){
        return $this->belongsTo(Condition::class);
    }

}
