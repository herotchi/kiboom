@if (Auth::check())
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('top') }}">
            kiboom
            <small class="border border-danger text-danger rounded">beta</small>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">設定</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#usersEdit" role="button">ユーザー名変更</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#usersLogin" role="button">ログイン情報変更</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex flex-row-reverse" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-success" type="submit">ログアウト</button>
            </form>
        </div>
    </div>
</nav>
@endif