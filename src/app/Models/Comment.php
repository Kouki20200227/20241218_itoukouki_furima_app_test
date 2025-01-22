<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['profile_id', 'item_id', 'comment',];

    public static $rules = array(
        'profile_id' => 'required',
        'item_id' => 'required',
        'comment' => 'required',
    );

    public function item(){
        return $this->belongsTo(Item::class, 'id', 'item_id');
    }

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
