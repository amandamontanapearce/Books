<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  // should use SoftDeletes;

  protected $table = 'books';
  public $timestamps = false;
  protected $fillable = ['title', 'author',  'publication_date', 'id'];

}
