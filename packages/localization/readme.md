# Localization - Laravel package for localization 

Localization is a package created in educational purposes. Not a production project. 
However, it really works well and due to the extensible architecture of the package 
it is easy to add new locales to your Laravel project.

## Prerequisites

- ```bootstrap 5```

## Installation

- download package from the current repository and put it in ```/packages/localization``` folder
- manually add ```Localization\LocaleServiceProvider::class``` to the providers at ```/config/app.php```
- manually move ```\Illuminate\Session\Middleware\StartSession::class``` from ```middlewareGroups/web``` 
to a top of ```middleware``` at ```/app/Http/Kernel.php```
- add ```"Localization\\": "packages/localization/src"``` to ```/composer.json/autoload/psr-4``` for further
compatibility
- run the following command:
```bash
$ php artisan vendor:publish --provider="Localization\\LocaleServiceProvider"
```

## Basic Usage

#### Config
You can alter ```/config/locale.php``` to adjust localization:

```php
<?php

return [
    'available' => [
        'en' => 'English',
        'ru' => 'Русский',
    ],
    'default' => 'en'
];
```

#### Locales

At ```/resources/lang``` you can create folders with appropriate language codes as names, e.g.:

```php
// /resources/lang/en/app.php
<?php

return [
    'home' => 'Home',
    'about_us' => 'About us',
    'doctors' => 'Doctors',
    'news' => 'News',
    'contact' => 'Contact',
    'admin' => 'Admin',
    'posts' => 'Posts',
    'categories' => 'Categories',
    'language' => 'Language'
];
```

```php
// /resources/lang/ru/app.php
<?php

return [
    'home' => 'Главная',
    'about_us' => 'Про нас',
    'doctors' => 'Наши доктора',
    'news' => 'Новости',
    'contact' => 'Связаться',
    'admin' => 'Админ',
    'posts' => 'Посты',
    'categories' => 'Категории',
    'language' => 'Язык'
];
```

#### View
Add ```@include('localization::dropdown')``` to ```navbar``` to access locale changes:


```html
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupport">
            <ul class="navbar-nav ml-auto">
                <!-- another controlls here -->
                @include('localization::dropdown')
            </ul>
        </div>
    </div>
</nav>
```

For example, your can use ```{{ __('app.home') }}``` to access the value for key ```home``` from ```/resources/lang/{currentLocale}/app.php```.
The default fallback dictionary is ```en```.

### License

No license required.
