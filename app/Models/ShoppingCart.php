<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    protected $table = 'shopping_carts';

    public function InShoppingCarts(){
        return $this->hasMany('App\Models\InShoppingCart');
    }

    public function cursos(){
        return $this->belongsTo('App\Models\CursoListado', 'listado_id', 'id');
    }

    public function precios(){
        return $this->belongsTo('App\Models\CursoPrecio', 'precio_id', 'id');
    }

    public function productsSize(){
        return $this->cursos()->count();
    }

    public function total(){
        return $this->precios()->sum("id");
    }

    public static function findOrCreateBySessionID($shopping_cart_id){
        if($shopping_cart_id){
            return ShoppingCart::findBySession($shopping_cart_id);
        }else{
            return ShoppingCart::createWithoutSession();
        }
    }

    public static function findBySession($shopping_cart_id){
        return ShoppingCart::find($shopping_cart_id);
    }

    public static function createWithoutSession(){
        return ShoppingCart::create([
            "status" => "incompleted"
        ]);
    }
}