<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class products extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable =['user_id','name','info','price'];

    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price')->withTimestamps();
    }
}
