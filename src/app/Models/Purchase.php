<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['item_id', 'user_id', 'purchase_price', 'purchase_payment_method', 'purchase_address', 'purchase_post_code', 'purchase_building',];

    public static $rules = array(
        'item_id' => 'required',
        'user_id' => 'required',
        'purchase_price' => 'required',
        'purchase_payment_method' => 'required',
        'purchase_address' => 'required',
        'purchase_post_code' => 'required',
        'purchase_building' => 'required',
    );

    public function item(){
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }
}
