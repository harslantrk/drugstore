<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Ürünler
    protected $fillabled = [
    	'name', 'description','content','image','stock','price','tags','options','priority','display',
    ]; 
}
