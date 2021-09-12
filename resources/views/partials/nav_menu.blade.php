<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item{{$active_menu_item=='main' ? ' active' : ''}}">
            <a class="nav-link" href="/">Главная</a>
        </li>
        <li class="nav-item{{$active_menu_item=='catalog' ? ' active' : ''}}">
            <a class="nav-link" href="/articles/">Каталог статей</a>
        </li>
    </ul>
</nav>
