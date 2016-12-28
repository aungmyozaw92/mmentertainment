<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = ['name','mm_name'];

	protected $table = 'category';

    public function subcategory()
    {
        return $this->hasMany('App\Models\SubCategory');
    }
}
