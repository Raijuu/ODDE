<?php


       //$service_url = 'https://data.delaware.gov/resource/f6a3-crpj.json';
       //$curl = curl_init($service_url);
       //curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       //curl_setopt($curl, CURLOPT_POST, true);
       //$curl_response = curl_exec($curl);
       //curl_close($curl);

       //$jsonObject = jsondecode($curl_response);



       //next example will recieve all messages for specific conversation
       $service_url = 'https://data.delaware.gov/resource/f6a3-crpj.json';
       $curl = curl_init($service_url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $curl_response = curl_exec($curl);
       
       if ($curl_response === false) {
         $info = curl_getinfo($curl);
         curl_close($curl);
         die('error occured during curl exec. Additioanl info: ' . var_export($info));
       }
       curl_close($curl);
       
       $decoded = json_decode($curl_response);
       if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
         die('error occured: ' . $decoded->response->errormessage);
       }
       echo 'response ok!';


       print_r($decoded);


       //************sqlite3
       
       date_default_timezone_set('UTC');
  try {
    $file_db = new PDO('OpenDataDE.db');

    $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    




    $file_db = null;
  }
  catch(PDOException $e) {
    echo $e->getMessage();
  }
  
