<?php namespace App\Http\Controllers;

use App\book;
use App\bookrequest;
use App\Http\Requests;

use App\Http\Requests\adminAddBookRequest;
use App\Http\Requests\professorBookRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('captainsRoom.addBook');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(adminAddBookRequest $request)
	{
        if(Input::hasFile('thumbnail')){
            $file = Input::file('thumbnail');
            $extentsion = $file->guessExtension();
            $filename = time().'-'.$request['title'].'-'.$request['author'].'.'. $extentsion;
            $file->move(public_path().'/assets/bookImages/', $filename);
            $book = new book();
            $book->title = $request['title'];
            $book->author = $request['author'];
            $book->publisher = $request['publisher'];
            $book->pprice = $request['pprice'];
            $book->rprice = $request['rprice'];
            $book->isbn = $request['isbn'];
            $book->description = $request['description'];
            $book->category = $request['category'];
            $book->class = $request['class'];
            $book->professor = $request['professor'];
            $book->onHand = $request['onHand'];
            $book->thumbnail = $file->getRealPath().$filename;
            $book->save();

            //$createArray = array_add($request->all(), 'thumbnail', $file->getRealPath());
            //book::create($createArray);

            Session::flash('flash_note', 'The book has been stored');
            return redirect('captainsRoom/addBook');
        }
        Session::flash('flash_note', 'File upload failed');
        return redirect('captainsRoom/addBook');

        //dd($request);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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

    public function request(){
        $professor = Auth::user();
        return view('professor.bookRequest', compact('professor'));
    }

    public function saveRequest(professorBookRequest $request){
        bookrequest::create($request->all());
        return redirect('/professorPage/allbookRequests');
    }

    public function showAllRequests(){
        $thisprofessor = Auth::user();
        $bookRequests = bookrequest::all()->where('professor', $thisprofessor['username']);

        return view('professor.allBookRequests', compact('bookRequests'));
    }

    public function captainsOrders(){
        $bookRequests = bookrequest::all();
        return view('captainsRoom.allbookrequests', compact('bookRequests'));
    }

}
