<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class bookrequest extends Model {

	//
    protected $fillable = ['title', 'author', 'publisher', 'professor_id', 'edition', 'class'];
    protected $attributes = ['approved' => 'n'];

}
