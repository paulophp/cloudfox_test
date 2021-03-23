<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use MercadoPago;

class PagamentoBoletoController extends Controller
{
    //
    
    public function processar(Request $request)
    {
        
        if(1) //validade some data
        {
            
            MercadoPago\SDK::setAccessToken("TEST-6765632652566384-031220-09d9a467a746d7d9b06febde7e32f41c-249922967"); // Either Production or SandBox AccessToken

            $payment = new MercadoPago\Payment();
            $payment->transaction_amount = $request->transactionAmount;
            $payment->description = "Produto de teste";
            $payment->payment_method_id = "bolbradesco";
            $payment->payer = array(
                "email" => $request->payerEmail,
                "first_name" => $request->payerFirstName,
                "last_name" => $request->payerLastName,
                "identification" => array(
                    "type" => $request->docType,
                    "number" => $request->docNumber
                 ),
                "address"=>  array(
                    "zip_code" => "06233200",
                    "street_name" => "Av. das Nações Unidas",
                    "street_number" => "3003",
                    "neighborhood" => "Bonfim",
                    "city" => "Osasco",
                    "federal_unit" => "SP"
                 )
              );
           
            $payment->save();

            $response = array(
                'status' => $payment->status,
                'status_detail' => $payment->status_detail,
                'id' => $payment->id
            );

            if ($response['status'] == 'pending') {
                return view('boleto_obrigado', ['link'=>$payment->transaction_details->external_resource_url]);
            }else{

                
                dd($payment);
                
                exit;
            }
            
        }
    }
}
