<?php
namespace nattaponra\truemoney;

interface ServiceInterface
{
    public function charge($trueMoneyNumber);
}