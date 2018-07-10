<?php
namespace nattaponra\truemoney\Services;

use nattaponra\truemoney\Service;
use nattaponra\truemoney\ServiceInterface;

class TMPay extends  Service implements ServiceInterface  {

    private $config;


    public function __construct()
    {
        $this->config = config("truemoney.services.tmpay");
    }

    public function serviceName()
    {
        return "TMPay";
    }

    public function charge($trueMoneyNumber)
    {
        if(function_exists('curl_init'))
        {
            $curl = curl_init('https://www.tmpay.net/TPG/backend.php?merchant_id='.$this->config["merchant_id"].'&password='.$trueMoneyNumber. '&resp_url='.$this->config["resp_url"]);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_HEADER, FALSE);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $curl_content = curl_exec($curl);
            curl_close($curl);

        }else{
            $curl_content = file_get_contents('http://www.tmpay.net/TPG/backend.php?merchant_id='.$this->config["merchant_id"].'&password='. $trueMoneyNumber .'&resp_url='.$this->config["resp_url"]);
        }

        if(strpos($curl_content,'SUCCEED') !== FALSE)
        {
            return true;

        }  else
        {
            return false;
        }
    }


}