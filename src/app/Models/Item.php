<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'category_item_id' => 'required',
        'condition_id' => 'required',
        'item_image' => 'required',
        'product_name' => 'required',
        'item_detail' => 'required',
        'favorite' => 'required',
        'buy_flg' => 'required',
    );
    
}