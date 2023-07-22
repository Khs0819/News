<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //    protected $table = 'category';
    //    protected $primaryKey = 'category_id';
    //    protected $keyType = 'int';
    //    public $incrementing = true;

    public function subcategories()
    {
        //This is Enough if i Commit with laravel naming pattern( _id نفس اسم الجدول مفرد متبوع ب )
        // $this->hasMany(Subcategory::class);

        //if i don't Commit with laravel naming pattern (,FK name ,PK in the table)
        // return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id')->take(3)->orderBy('updated_at','desc');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->articles()->delete();
        });

    }
}