<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\Models\Currency;

class PaymentController extends Controller
{
    

    public function createPayment(Request $request){
        $username = $request->input('data')['name'];
        $amount = (int)$request->input('data')['amount'];
        $idempotency_key = uniqid($username[0],true);
        $source_id = $request->input('data')['sourceId'];
        $location_id = $request->input('data')['locationId'];        
        
        $money = $this->createMoney($amount);
        $customer = new SquareClient([
            'accessToken' => config('services.square.token'),
            'environment' => 'sandbox'
        ]);
        
        $pay = new createPaymentRequest($source_id,$idempotency_key,$money);
        $pay->setLocationId($location_id);
        $pay->setNote("Donation made by: $username ");
        
        $payment = $customer->getPaymentsApi();
        $payment->createPayment($pay);
        $paymentCreated = $payment->createPayment($pay);

        return $paymentCreated->isSuccess() ? $paymentCreated->getResult() : $paymentCreated->getErrors();

    
    }

    public function createMoney($amount = 0){
        $money = new Money();
        $money->setAmount($amount);
        $money->setCurrency(Currency::USD);
        return $money;
    }

}
