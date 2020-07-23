<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product(Type $var = null)
    {
        //Relacón de muchos a una de la tabla Category y Product
        return $this->hasMany(Product::class);
    }
}
