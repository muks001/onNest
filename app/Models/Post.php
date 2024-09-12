<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['image','description'];
    


    public function getImageUrlAttribute($value)
    {
        if (empty($this->image)) {
            return null;
        }
        return asset($this->image) ;
    }


    public function user()
{
    return $this->belongsTo(User::class);
}
}
