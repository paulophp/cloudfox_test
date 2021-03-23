<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use MercadoPago;

class PagamentoController extends Controller
{
    //
    
    public function processar(Request $request)
    {
        
        if(1) //validade some data if necessary
        {
            
            MercadoPago\SDK::setAccessToken("TEST-6765632652566384-031220-09d9a467a746d7d9b06febde7e32f41c-249922967"); // Either Production or SandBox AccessToken

            $payment = new MercadoPago\Payment();
            
            $payment->transaction_amount = (float)$request->transactionAmount;
            $payment->token = $request->token;
            $payment->description = $request->description;
            $payment->installments = (int)$request->installments;
            $payment->payment_method_id = $request->paymentMethodId;
            
            if(isset($request->issuer))
                $payment->issuer_id = (int)$request->issuer;

            $payer = new MercadoPago\Payer();
            $payer->email = $request->email;
            $payer->identification = array( 
                "type" => $request->docType,
                "number" => $request->docNumber
            );
            $payment->payer = $payer;

            $payment->save(); 

            $response = array(
                'status' => $payment->status,
                'status_detail' => $payment->status_detail,
                'id' => $payment->id
            );

            if ($response['status'] == 'approved') {
                return view('cartao_obrigado');
            }else{

                echo json_encode($response);
                
                dd($payment);
                
                
            }
            
        }
    }
}
