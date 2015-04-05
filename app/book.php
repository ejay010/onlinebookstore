<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model {

	//
    protected $fillable = [
        'title', 'author', 'publisher', 'pprice', 'rprice', 'isbn', 'description', 'category', 'class', 'professor_id', 'onHand', 'thumbnail'
    ];

}
