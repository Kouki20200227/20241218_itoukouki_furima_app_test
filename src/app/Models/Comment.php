<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['user_id', 'item_id', 'comment',];

    public static $rules = array(
        'user_id' => 'required',
        'item_id' => 'required',
        'comment' => 'required',
    );
}
