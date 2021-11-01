<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="lang" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ __('app.language') }}
    </a>
    <ul class="dropdown-menu" aria-labelledby="lang">
        @foreach (\Localization\LocaleService::availableLocales() as $locale)
        <li><a class="dropdown-item" href="/locale/{{ $locale->code }}">{{ $locale->name }}</a></li>
        @endforeach
    </ul>
</li>