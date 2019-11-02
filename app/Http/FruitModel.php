<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FruitModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'fruits';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['image', 'name', 'price'];

    
}
