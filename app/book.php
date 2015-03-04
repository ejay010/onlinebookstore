<?php
/**
 * Created by PhpStorm.
 * User: ejay010
 * Date: 2/10/15
 * Time: 1:48 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class book extends Model{
    protected $fillable = [
        'title', 'author', 'publisher', 'pprice', 'rprice', 'isbn', 'description', 'category', 'class', 'professor', 'onHand', 'thumbnail'
    ];

} 