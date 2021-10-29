<?php

namespace App\Http\Controllers;

use App\Services\Locale as ServicesLocale;
use Locale;

class LocaleController extends Controller
{
    public function setLocale($code)
    {
        ServicesLocale::setLocale($code);
        return redirect()->back();
    }
}
