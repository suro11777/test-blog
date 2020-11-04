<div class="tm-header">
    <div class="container-fluid">
        <div class="tm-header-inner">
            <a href="{{route('home')}}" class="navbar-brand tm-site-name">Test Blog</a>

            <!-- navbar -->
            <nav class="navbar tm-main-nav">

                <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse"
                        data-target="#tmNavbar">
                    &#9776;
                </button>

                <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{request()->route()->getName() == 'home'?'active':''}}">
                            <a href="{{route('home')}}" class="nav-link">Главная страница</a>
                        </li>
                        <li class="nav-item {{request()->route()->getName() != 'home'?'active':''}}">
                            <a href="{{route('articles.index')}}" class="nav-link"> Каталог статей</a>
                        </li>

                    </ul>
                </div>

            </nav>

        </div>
    </div>
</div>
