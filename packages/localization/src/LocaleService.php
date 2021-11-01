<?php

namespace Localization;

use Exception;
use Illuminate\Support\Facades\Session;

class LocaleService
{
    const SESSION_KEY = 'locale';

    public static function availableLocales()
    {
        $availableLocales = config('locale.available');
        if(empty($availableLocales)) {
            throw new LocaleNotFoundException('Available locales is empty.');
        }
        $locales = collect();
        foreach ($availableLocales as $code => $name) {
            $locales->push((object)[
                'code' => $code,
                'name' => $name
            ]);
        }
        return $locales;
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
            if(empty(config('locale.default'))) {
                throw new LocaleNotFoundException('Locale config is not reachable.');
            }
            return config('locale.default');
        }
        return $code;
    }
}