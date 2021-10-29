<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class Locale
{
    const EN = 'en';
    const RU = 'ru';
    const SESSION_KEY = 'locale';

    public static function availableLocales()
    {
        return collect([
            (object)[
                'code' => self::RU,
                'name' => 'Русский'
            ],
            (object)[
                'code' => self::EN,
                'name' => 'English'
            ]
        ]);
    }

    public static function setLocale($code)
    {
        if (self::availableLocales()->where('code', $code)->isEmpty()) {
            throw new \Exception('Unsupported locale.');
        }
        Session::put(self::SESSION_KEY, $code);
    }

    public static function getLocale()
    {
        return Session::get(self::SESSION_KEY, self::detectDefault());
    }

    public static function detectDefault()
    {
        $code = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        if (self::availableLocales()->where('code', $code)->isEmpty()) {
            return self::EN;
        }
        return $code;
    }
}