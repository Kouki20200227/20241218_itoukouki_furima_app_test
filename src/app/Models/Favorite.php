<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'item_id'];

    public static $rules = [
        'user_id' => 'required',
        'item_id' => 'required',
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }
}
