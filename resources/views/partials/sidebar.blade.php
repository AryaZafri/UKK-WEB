<aside class="menu-sidebar d-none d-lg-block">
    <div class="font-weight-bold text-center mt-5">
        <a href="/buku">
            Dashboard
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                {{-- <li>
                    <a href="/buku">
                        <i class="fas fa-table"></i>Data Books</a>
                </li> --}}
                <li>
                    <a href="{{ route ('buku.create')}}">
                        <i class="fas fa-plus"></i>Add Book</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>