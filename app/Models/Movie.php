<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory, SoftDeletes;
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'movies';

   /**
    * The primary key associated with the model.
    *
    * @var string
    */
   public $primaryKey = 'id';

   public $timestamps = true;

   const CREATED_AT = 'created_at';
   const UPDATED_AT = 'updated_at';
   const DELETED_AT = 'deleted_at';

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = [
       'created_at' => 'datetime',
       'updated_at' => 'datetime',
       'deleted_at' => 'datetime',
    //    'status' => Status::class,
   ];

   protected $fillable = [
       'title',
       'description',
       'category',
       'thumbnail',
       'file',
       'banner',
       'subtitle',
       'duration',
       'release_year',
       'uploaded_by',
       'producer'
   ];
}
