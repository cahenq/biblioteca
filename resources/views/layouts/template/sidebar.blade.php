<head>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <br>
                        <!-- Logo em círculo acima do link Biblioteca -->
                        <div class="logo-container">
                            <div class="circle">
                                <img src="img/logo-escola.png" alt="Logo">
                            </div>
                        </div>
                        <a class="nav-link {{ Route::currentRouteName() == 'biblioteca' ? 'active' : '' }}" href="{{ route('biblioteca') }}" style="color: #343a40;">
                            Início
                        </a>
                        <a class="nav-link {{ Route::currentRouteName() == 'emprestimos.buscar-livro' ? 'active' : '' }}" href="{{ route('emprestimos.buscar-livro') }}" style="color: #343a40;">
                            Empréstimo de livro
                        </a>
                        
                        <a class="nav-link {{ Route::currentRouteName() == 'cadastrar-livro' ? 'active' : '' }}" href="{{ route('cadastrar-livro') }}" style="color: #343a40;">
                            Adicionar Livro
                        </a>
                        <a class="nav-link {{ Route::currentRouteName() == 'cadastrar-leitor' ? 'active' : '' }}" href="{{ route('cadastrar-leitor') }}" style="color: #343a40;">
                            Cadastrar Leitores
                        </a>

                        <div style="height: 2.5cm;"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="logout-link" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Sair') }}
                            </a>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                {{-- MAIN --}}
            </main>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const layoutSidenav = document.getElementById('layoutSidenav_nav');

    // Verifica se o estado colapsado foi salvo no localStorage
    if (localStorage.getItem('sidebarCollapsed') === 'true') {
        layoutSidenav.classList.add('collapsed');
    }

    sidebarToggle.addEventListener('click', function (e) {
        e.preventDefault();
        layoutSidenav.classList.toggle('collapsed');
        
        // Salva o estado no localStorage
        localStorage.setItem('sidebarCollapsed', layoutSidenav.classList.contains('collapsed'));
    });
});

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    @endpush
</body>
