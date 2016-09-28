<?php

namespace Jeylabs\CUA\Facades;
use Illuminate\Support\Facades\Facade;

class Cua extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cua';
    }
}