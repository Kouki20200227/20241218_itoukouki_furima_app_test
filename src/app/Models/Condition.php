<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    protected $fillable = ['condition'];

    public static $rules = array(
        'condition' => 'required',
    );

    public function item(){
        return $this->hasOne(Condition::class, 'id', 'condition_id');
    }
}
