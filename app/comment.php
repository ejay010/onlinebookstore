<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model {

	//
   protected $fillable = ['book_id', 'comment', 'user_id'];
}
