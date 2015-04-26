<?php namespace App\Http\Controllers;

use App\book;
use App\bookStore\Billing\StripeBilling;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller {
    private $shipping;
    private $cart;
    private $email;
	//

    public function checkOut(Request $input){
        $input = Input::all();
        $this->email = $input['email'];
        $biller = new StripeBilling();
        $biller->charge($input);
        try{
        $this->saveTransaction();
        } catch(\PDOException $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
        return view('profile.thanking');
    }

    private function getCart(){
        $shoppingCartController = new ShoppingCartController();
        $this->cart = $shoppingCartController->returnCart();
    }

    private function saveTransaction(){
        $this->getCart();
        $theCart = $this->cart;
        $shippingInfo = Session::get('shipping');
        $theEmail = $this->email;
        foreach($theCart as $key => $value){
            $item = book::find($key);
            $itemName = $item['title'];
            $author = $item['author'];
            $newOnHand = $item['onHand'] - $value;
            $publisher = $item['publisher'];
            $pprice = $item['pprice'];
            $isbn = $item['isbn'];
            $description = $item['description'];
            $category = $item['category'];
            $fullName = $shippingInfo['fullName'];
            $address1 = $shippingInfo['address1'];
            $address2 = $shippingInfo['address2'];
            $city = $shippingInfo['city'];
            $state = $shippingInfo['state'];
            $zip = $shippingInfo['zip'];
            $country = $shippingInfo['country'];
            $email = $theEmail;
            $date = Carbon::now()->timestamp;
            DB::table('transactions')->insert(['title' => $itemName, 'author' => $author, 'publisher' => $publisher, 'pprice' => $pprice, 'isbn' => $isbn, 'description' => $description,
            'category' => $category, 'fullName' => $fullName, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'zip' => $zip, 'country' => $country, 'email' => $email,
            'created_at' => $date]);
            DB::table('books')->where('id', $key)->update(['onHand' => $newOnHand]);
        }
    }


    public function getShipping(){
        return view('profile.shipping');
    }

    public function saveShipping(Request $input){
        $fullName = $input['fullName'];
        $address1 = $input['address1'];
        $address2 = $input['address2'];
        $city = $input['city'];
        $state = $input['state'];
        $zip = $input['zip'];
        $country = $input['country'];
        $this->validate($input,['fullName' => 'required|min:3', 'address1' => 'required', 'city' => 'required', 'state' => 'required|min:5', 'zip' => 'required|min:5', 'country' => 'required']);
        try{
            Session::put('shipping', $input->all());
            $this->shipping = Session::get('shipping');
            DB::table('Shipping')->insert(['fullName' => $fullName, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'zip' => $zip,
            'country' => $country]);
        } catch(\PDOException $e){
            return redirect()->back();
        }
        return redirect('/checkOut');
    }
}
