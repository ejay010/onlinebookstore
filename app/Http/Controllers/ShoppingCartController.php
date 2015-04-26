<?php namespace App\Http\Controllers;

use App\book;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller {
    protected $myCart;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    function __construct()
    {
        // check if the session has a cart
        if(Session::has('cart')){
            $this->myCart = Session::get('cart');
        } else {
            Session::put('cart', []);
            $this->myCart = Session::get('cart');
        }
    }

    public function index()
	{
		//
        $total = 0;
        $items = array();
        $theCart = $this->myCart;
        foreach($theCart as $key => $value){
            $item = book::find($key);
            $subtotal = $item['pprice'] * $value;
            $total += $subtotal;
            array_add($item, 'quantity', $value);
            array_add($item, 'subtotal', $subtotal);
            array_push($items, $item);
        }
        return $items;

	}

    public function getCartTotal(){
        $itemsArray = $this->index();
        $cartTotal = 0;
        foreach($itemsArray as $items){
            $cartTotal += $items['subtotal'];
        };
        return $cartTotal;
    }

	public function addToCart()
	{
		//
        $values = Input::all();
        $item = $values['id'];
        $quantity = $values['quantity'];
        $this->setItemsToCart($item, $quantity);
        return Redirect::back()->with('message', 'Added to Cart');
	}

    public function removeFromCart(){
        $values = Input::all();
        $item = $values['id'];
        $this->unsetAnItemFromCart($item);
    }

    public function removeDirectly(){
        $values = Input::all();
        $item = $values['id'];
        $this->unsetAnItemFromCart($item);
        return redirect('/viewCart');
    }

    public  function editItemQuantityInCart(){
        $values = Input::all();
        $item = $values['id'];
        $newQuantity = $values['quantity'];
        $this->setItemsToCart($item, $newQuantity);
    }

    public function editItemQuantityInCartWithValues($id, $quantity){
        $item = $id;
        $newQuantity = $quantity;
        $this->setItemsToCart($item, $newQuantity);
    }

    public function setItemsToCart($key, $value){
        $this->myCart[$key] = $value;
        $this->updateSessionCart();
    }

    public function unsetAnItemFromCart($key){
        unset($this->myCart[$key]);
        $this->updateSessionCart();
    }

    public function updateSessionCart(){
        Session::forget('cart');
        Session::put('cart', $this->myCart);
        $this->myCart = Session::get('cart');
    }

    public function getDescriptionString(){
        $theString = "";
        $theCart = $this->myCart;
        foreach($theCart as $key => $value){
            $item = book::find($key);
            $itemName = $item['title'];
            $itemQuantity = $value;
            $subtotal = $item['pprice'] * $value;
            $theString = $theString." Item: ".$itemName." Quantity: ".$itemQuantity." SubTotal: ".$subtotal.",";
        }
        return $theString;
    }

    public function returnCart(){
        return $this->myCart;
    }
}
