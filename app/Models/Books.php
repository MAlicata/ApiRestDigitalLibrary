<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'pages',
        'user_id'
    ];
    /**
     * Get all of the reviews for the book
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class)->cascadeDelete();
    }

    /**
     * 
     * 
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
