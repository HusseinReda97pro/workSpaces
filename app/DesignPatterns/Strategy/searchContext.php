<?php
/**
 * Created by PhpStorm.
 * User: Hussein Reda
 * Date: 4/30/2019
 * Time: 2:19 PM
 */

namespace App\DesignPatterns\Strategy;

class searchContext
{
    private  $strategy;
    public function __construct(strategySearch $strategy)
    {
        $this->strategy = $strategy;
    }
    public  function doSearch($re){
        return $this->strategy->search($re);
    }


}
