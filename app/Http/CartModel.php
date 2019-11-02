<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShopSnapshotModel;

class CartModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'cart';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['session_id', 'product_id', 'amount', 'price'];

    public static function getProducts($session_id)
    {
        return self::where('session_id', $session_id)->whereNull('sold');
    }

    /**
     * The function to define relationship with the fruit model.
     *
     * @access public
     * @var array
     */
    public function fruit()
    {
        return $this->hasOne('App\FruitModel', 'id', 'product_id');
    }
}
