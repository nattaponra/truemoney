<?php
namespace nattaponra\truemoney\Services;

use nattaponra\truemoney\Service;
use nattaponra\truemoney\ServiceInterface;

class TMPay extends  Service implements ServiceInterface  {

    public function serviceName()
    {
        return "TMPay";
    }

    public function charge($trueMoneyNumber)
    {

    }


}