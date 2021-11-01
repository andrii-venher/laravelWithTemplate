<?php

namespace Localization;

use App\Http\Controllers\Controller;
use Localization;

class LocaleController extends Controller
{
    public function setLocale($code)
    {
        LocaleService::setLocale($code);
        return redirect()->back();
    }
}
