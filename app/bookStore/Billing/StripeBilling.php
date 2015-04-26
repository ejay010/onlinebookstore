<?php
/**
 * Created by PhpStorm.
 * User: ejay010
 * Date: 4/13/15
 * Time: 7:27 AM
 */

namespace App\bookStore\Billing;

use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Error\Card as card_error;
use Stripe\Card;

use App\book;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Config;

class StripeBilling implements BillingInterface{

    public function __construct(){
        Stripe::setApiKey(Config::get('stripe.secret_key'));
    }

    public function charge(array $data){
        $total = $this->getCartTotal() * 100;
        $token = $data['stripeToken'];
        $email = $data['email'];
        $description = $this->getDescription();
        try{
            return Charge::create([
                'amount' => $total,
                'currency' => 'usd',
                'description' => $description,
                'source' => $token,
                'receipt_email' => $email
            ]);
        } catch (card_error $e){
            dd('Card was declined');
        }

    }

    private function getCartTotal(){
        $cartController = new ShoppingCartController();
        $total = $cartController->getCartTotal();
        return $total;
    }

    private function getDescription(){
        $cartController = new ShoppingCartController();
        return $cartController->getDescriptionString();
    }
} 