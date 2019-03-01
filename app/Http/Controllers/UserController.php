<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\authentication;

class UserController extends Controller
{
    public function Datos(){

       
    }


    //Petición y codificación URL
    public function getJson (){
        
        /*
            ===Construción del Nonce y declaración de Variables para el Trankey====
        */
        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        $nonceBase64 = base64_encode($nonce);
        $secretKey = '024h1IlD';
        $seed = date('c');
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));
        /*
            ===Fin Construcción====
        */
    
        

        $link = 'https://test.placetopay.com/redirection/api/session';
        $request = array(

            $auth = array(
                        'login' => '6dd490faf9cb87a9862245da41170ff2',
                        'seed' => $seed,
                        'nonce' => $nonceBase64,
                        'tranKey' => $tranKey
                    ),

            $payment = array(
                'reference' => '5976030f5575d',
                'description' => 'Pago básico de prueba',
                'amount' => 
                        array(
                            'currency' => 'COP',
                            'total' => '10000'
                        ),
                'expiration' => date('c', strtotime('+1 hour')),
                'returnUrl' => 'https://dev.placetopay.com/redirection/sandbox/session/5980a78fd4420',
                'ipAddress ' => '127.0.0.1',
                'userAgent' => 'PlacetoPay Sandbox'
            )
    
        );
            /*
                * Conexión por cURL
                * ¡Códico sin fines comerciales!            
            */
            $ch = curl_init($link);
            $datos_json = json_encode($request);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $datos_json);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'User-Agent: cUrl Testing'));
            $result = curl_exec($ch);
            dd($result);
            return view('usuarios')->with('items', $result);
    }
        
}



