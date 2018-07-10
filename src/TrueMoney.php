<?php
namespace nattaponra\truemoney;

use nattaponra\truemoney\Services\TMPay;

Class TrueMoney{


    /**
     * @var \nattaponra\truemoney\ServiceInterface
     */
    private $service;


    /**
     * @var string
     */
    private $defaultServiceName;



    public function __construct()
    {
        $this->defaultServiceName = config("truemoney.default_service");

        if($this->defaultServiceName == "tmpay"){
            $this->service = new TMPay();
        }

    }

    /**
     * Charge money from true money number via service.
     * @param  string   $trueMoneyNumber
     * @return boolean
     */
    public function charge($trueMoneyNumber){
        return $this->service->charge($trueMoneyNumber);
    }
}


