<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name','mm_name','category_id'];

	protected $table = 'subcategory';

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
