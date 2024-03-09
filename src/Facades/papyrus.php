<?php

namespace Ambiene\Papyrus\Facades;

use Illuminate\Support\Facades\Facade;

class Papyrus extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "papyrus";
    }
}
