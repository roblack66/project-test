<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['category']; // Ensures category object is always loaded

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

}
