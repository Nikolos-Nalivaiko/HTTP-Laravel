<header class="header">
    <div class="header__container">
        <a href="index.html">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo HTTP" class="logo" width="auto" height="60">
        </a>

        <div class="header__menu menu">
            <nav class="menu__body">

                <div class="menu__header">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.svg') }}" alt="Logo HTTP" class="logo" width="auto" height="60">
                    </a>

                    <div class="menu__icon_close menu-close icon-menu">
                        <svg>
                            <use xlink:href="{{ asset('img/icons/icons.svg#IconClose(Error)') }}"></use>
                        </svg>
                    </div>
                </div>

                <ul class="menu__list">
                    <li class="menu__item">
                        <a href="{{ route('home') }}" class="menu__item-title">Головна</a>
                    </li>
                    <li class="menu__item">
                        <p class="menu__item-title" data-target="dropdown1">
                            Вантажі
                            <svg class="menu__item-icon">
                                <use xlink:href="{{ asset('img/icons/icons.svg#IconArrowOpen') }}"></use>
                            </svg>
                        </p>
                        <div class="dropdown" id="dropdown1">
                            <div class="dropdown__block">
                                <a href="{{ route('cargo.create') }}" class="dropdown__block-link">
                                    <div class="dropdown__icon">
                                        <svg>
                                            <use xlink:href="{{ asset('img/icons/icons.svg#IconCargoAdd') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="dropdown__text">
                                        <p class="dropdown__title">Додати вантаж</p>
                                        <p class="dropdown__subtitle">Заповніть дані про вантаж у цьому розділі, щоб додати його до біржи вантажів</p>
                                    </div>
                                </a>
                            </div>

                            <div class="dropdown__block">
                                <a href="{{ route('cargo.index') }}" class="dropdown__block-link">
                                    <div class="dropdown__icon">
                                        <svg>
                                            <use xlink:href="{{ asset('img/icons/icons.svg#IconCargos') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="dropdown__text">
                                        <p class="dropdown__title">Біржа вантажів</p>
                                        <p class="dropdown__subtitle">Переглядайте та знаходьте вантажі для транспортування у цьому розділі</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="menu__item">
                        <p class="menu__item-title" data-target="dropdown2">
                            Транспорт
                            <svg class="menu__item-icon">
                                <use xlink:href="{{ asset('img/icons/icons.svg#IconArrowOpen') }}"></use>
                            </svg>
                        </p>
                        <div class="dropdown" id="dropdown2">
                            <div class="dropdown__block">
                                <a href="" class="dropdown__block-link">
                                    <div class="dropdown__icon">
                                        <svg>
                                            <use xlink:href="{{ asset('img/icons/icons.svg#IconTruckAdd') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="dropdown__text">
                                        <p class="dropdown__title">Додати транспорт</p>
                                        <p class="dropdown__subtitle">Заповніть дані про транспорт у цьому розділі, щоб додати його до біржи транспорту</p>
                                    </div>
                                </a>
                            </div>

                            <div class="dropdown__block">
                                <a href="" class="dropdown__block-link">
                                    <div class="dropdown__icon">
                                        <svg>
                                            <use xlink:href="{{ asset('img/icons/icons.svg#IconTrucks') }}"></use>
                                        </svg>
                                    </div>
                                    <div class="dropdown__text">
                                        <p class="dropdown__title">Біржа транспорту</p>
                                        <p class="dropdown__subtitle">Переглядайте та знаходьте транспортні засоби для перевезення вантажів</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>


                @guest
                    <div class="header__btns header__btns_mobile">
                        <a href="signIn.html" class="header__btn-signin">Вхід</a>
                        <a href="" class="header__btn-signup">Реєстрація</a>
                    </div>
                @endguest

                @auth
                @endauth

            </nav>
        </div>

        @guest
            <div class="header__btns">
                <a href="{{ route('login') }}" class="header__btn-signin">Вхід</a>
                <a href="{{ route('register.select') }}" class="header__btn-signup">Реєстрація</a>
            </div>
        @endguest

        @auth
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="header__btn-signin">Log Out</button>
        </form>
        @endauth

        <div class="menu__icon_open icon-menu">
            <svg>
                <use xlink:href="{{ asset('img/icons/icons.svg#IconMenu') }}"></use>
            </svg>
        </div>

    </div>

</header>