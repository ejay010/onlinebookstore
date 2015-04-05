<?php namespace App\Http\Controllers;

use App\book;
use App\comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CommentsController extends Controller {


	/**
	 * Display a listing of the resource.
	 *
	 * @return array
	 */
	public function commentsByBookId($theid)
	{
		//
        $formatComment = array();
        $theRecords = comment::where('book_id', '=', $theid)->get();
        foreach ($theRecords as $record){
            $username = $this->getUserName($record['user_id']);
            $comments = $record['comment'];
            $smallArray = [$username => $comments];
            array_push($formatComment, $smallArray);
        }
        return $formatComment;
	}

    public function commentsByUserId($id){
        $formatComment = array();
        $theRecords = comment::where('user_id', '=', $id)->get();
        foreach ($theRecords as $record){
            $bookTitle = $this->getBookName($record['book_id']);
            $comments = $record['comment'];
            $smallArray = [$bookTitle => $comments];
            array_push($formatComment, $smallArray);
        }
        return $formatComment;
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($book_id, $comment, $user_id)
	{
		//
        comment::create(['book_id' => $book_id, 'comment' => $comment, 'user_id' => $user_id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showbyBookId($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    protected function getUserName($id){
        $username = User::find($id, ['username']);
        return $username['username'];
    }

    protected function getBookName($id){
        $book = book::find($id, ['title']);
        return $book['title'];
    }

}
