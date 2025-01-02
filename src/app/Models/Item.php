<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
