<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ShoppingCart;
use App\InShoppingCart;

class InShoppingCart extends Model
{
    protected $fillable = ["product_id", "shopping_cart_id"];
}
