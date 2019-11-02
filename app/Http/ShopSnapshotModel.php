<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopSnapshotModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'shop_snapshot';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['session_id', 'total_price', 'status'];
}
