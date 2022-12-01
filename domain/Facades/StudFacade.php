<?php
namespace domain\Facades;

use domain\Services\StudService;
use Illuminate\Support\Facades\Facade;



class StudFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StudService::class;
    }
}
