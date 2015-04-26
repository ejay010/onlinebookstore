<?php
/**
 * Created by PhpStorm.
 * User: ejay010
 * Date: 4/13/15
 * Time: 7:26 AM
 */

namespace App\bookStore\Billing;


interface BillingInterface {

    public function charge(array $data);

} 