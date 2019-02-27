<?php 
    /* Prueba presentada por:
        Sebastian Vallejo Rojas
        sebasmuart@gmail.com
        ¡Uso exlusivo para presentación de pruebas! */

//Inicio del SoapClient
  class StartSesion{

    public static function SoapClient_Start(){
        try {
            $url = 'https://test.placetopay.com/soap/pse/?wsdl';
                 $requirements = array("trace" => 1, "exception" => 0);
                     return new SoapClient($url, $requirements);    
        } 
                catch (\Exception $e) {
                 return $e->getMessage();
                }
    }


    //===============================================================

    public static function MakeAuthentication(){
        $login = "6dd490faf9cb87a9862245da41170ff2";
        $secretKey = "024h1IlD";
        $seed = date('c');
            /*
            if (function_exists('random_bytes')) {
                $nonce = bin2hex(random_bytes(16));
            } elseif (function_exists('openssl_random_pseudo_bytes')) {
                $nonce = bin2hex(openssl_random_pseudo_bytes(16));
            } else {
                $nonce = mt_rand(0, mt_getrandmax());
            }    
            $nonceBase64 = base64_encode($nonce);
            */

        //return ["login" => $login, "tranKey" => base64_encode(sha1($nonce . $seed . $secretKey, true)), "seed" => $seed];
        return ["login" => $login, "tranKey" => SHA1($seed . $secretKey), "seed" => $seed];
        
    }

} 




?>