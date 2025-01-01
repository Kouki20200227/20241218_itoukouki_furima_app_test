<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['item_id', 'user_id', 'buy_price', 'payment_method', 'shipping_address', 'shipping_post_card', 'shipping_building',];

    public static $rules = array(
        'item_id' => 'required',
        'user_id' => 'required',
        'buy_price' => 'required',
        'payment_method' => 'required',
        'shipping_address' => 'required',
        'shipping_post_card' => 'required',
        'shipping_building' => 'required',
    );
}
