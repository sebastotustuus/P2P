<?php 

include_once 'inicializadores.php';
     /* Prueba presentada por:
            Sebastian Vallejo Rojas
            sebasmuart@gmail.com
            ¡Uso exlusivo para presentación de pruebas! */

        //======================
class getBanks {
    public function ListofBanks($i){
        try {
                $Cliente = StartSesion::SoapClient_Start();
                $Authentication = StartSesion::MakeAuthentication();
                $response = $Cliente->getBankList(["auth" => $Authentication]);                
                //print_r($response->getBankListResult->item[$i]->bankName);                
                return $response->getBankListResult->item[$i]->bankName;
        } 
                catch (\Exception $e) {
                return $e->getMessage();
                }
    }

}
/*$j = 1;
$bancos = new getBanks;
$bancos->ListofBanks($j);
*/
   

?>