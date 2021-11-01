<?php

use Illuminate\Support\Facades\Route;
use Localization\LocaleController;

Route::get('/locale/{code}', [LocaleController::class, 'setLocale']);