<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizeiro - Crie Quizzes Personalizados Gratuitamente</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
</head>

<body>

    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="/images/logo-quizeiro-212x50.png" alt="Quizeiro" height="50">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#home" class="nav-link px-2 link-dark">Início</a></li>
                <li><a href="#como-funciona" class="nav-link px-2 link-dark">Como Funciona</a></li>
                <li><a href="#criar-quiz" class="nav-link px-2 link-dark">Criar Quiz</a></li>
                <li><a href="#ultimos-criados" class="nav-link px-2 link-dark">Últimos Criados</a></li>
                <li><a href="#contato" class="nav-link px-2 link-dark">Contato</a></li>
            </ul>

            <div class="col-md-3 text-end">
                @auth
                    <div class="dropdown text-end" style="display: inline-block">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser"
                            data-bs-toggle="dropdown" aria-expanded="false" title="{{ Auth::user()->name }}">
                            <img src="{{ Gravatar::get(Auth::user()->email) }}" alt="{{ Auth::user()->name }}"
                                width="32" height="32" class="rounded-circle">
                        </a>

                        <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item" href="{{ route('account.edit') }}">Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('quizzes.index') }}">Meus Quizzes</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @if (config('adminlte.logout_method'))
                                    {{ method_field(config('adminlte.logout_method')) }}
                                @endif
                                {{ csrf_field() }}
                            </form>
                            <li><a class="dropdown-item" id="logout" href="#">Sair</a></li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Entrar</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Cadastrar</a>
                @endauth
            </div>
        </header>
    </div>

    <div class="b-example-divider"></div>

    <!-- Banner principal -->
    <section class="py-5 text-center container" id="home">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Bem-vindo ao Quizeiro!</h1>
                <p class="lead text-muted">Quizeiro é uma plataforma gratuita que permite que os usuários criem seus
                    próprios quizzes personalizados e os compartilhem com amigos.</p>
                <p>
                    <a href="{{ route('quizzes.index') }}" class="btn btn-primary my-2">Começar agora</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Como Funciona -->
    <section id="como-funciona" class="bg-light py-5">
        <div class="container">
            <h1 class="text-center pb-5 fw-light">Como Funciona</h1>
            <div class="row">
                <div class="col-lg-4">
                    <h3 class="fw-light">1. Crie</h3>
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="43%" y="50%" fill="#eceeef"
                            dy=".3em">Crie</text>
                    </svg>
                    <p class="pt-2">Use nossa ferramenta fácil de usar para criar seu próprio quiz personalizado.</p>
                </div>
                <div class="col-lg-4">
                    <h3 class="fw-light">2. Personalize</h3>
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="38%" y="50%" fill="#eceeef"
                            dy=".3em">Personalize</text>
                    </svg>
                    <p class="pt-2">Adicione perguntas, opções de resposta e personalize a aparência do seu quiz.</p>
                </div>
                <div class="col-lg-4">
                    <h3 class="fw-light">3. Compartilhe</h3>
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="38%" y="50%"
                            fill="#eceeef" dy=".3em">Compartilhe</text>
                    </svg>
                    <p class="pt-2">Compartilhe seu quiz com amigos, familiares ou público em geral.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Criar Quiz -->
    <section id="criar-quiz" class="py-5">
        <div class="container">
            <h1 class="text-center fw-light">Comece a Criar Seu Quiz</h1>
            <p class="text-center">Crie seu próprio quiz personalizado agora mesmo!</p>
            <div class="text-center">
                <a href="{{ route('quizzes.index') }}" class="btn btn-primary btn-lg">Criar Quiz</a>
            </div>
        </div>
    </section>

    <!-- Últimos Criados -->
    <section id="ultimos-criados">
        <div class="album py-5 bg-light">
            <div class="container">
                <h1 class="text-center fw-light pb-4">Últimos Criados</h1>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @forelse ($publicQuizzes as $quiz)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="{{ route('quizzes.share', [$quiz->user->username, $quiz->slug]) }}" target="_blank"><img src="/images/logo-400x400-silver.png" alt="{{ $quiz->title }}" width="100%"></a>
                            <div class="card-body">
                                <h5>{{ Str::limit($quiz->title, 30) }}</h5>
                                <p class="card-text">{{ Str::limit($quiz->description, 50) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('quizzes.share', [$quiz->user->username, $quiz->slug]) }}" class="btn btn-sm btn-outline-secondary">Visualizar</a>
                                    </div>
                                    <small class="text-muted">{{ $quiz->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-center">Sem quizzes públicos, por enquanto.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Contato -->
    <section id="contato" class="py-5">
        <div class="container">
            <h1 class="text-center fw-light pb-3">Entre em Contato</h1>
            <p class="text-center">Tem alguma pergunta ou comentário? Ficaremos felizes em ouvir você.</p>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('contact') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Seu Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Digite seu nome" maxlength="30" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Seu E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Digite seu e-mail" maxlength="30" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensagem</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" rows="5" placeholder="Digite sua mensagem" required>{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" id="btnContact" class="btn btn-primary">Enviar Mensagem</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <div class="container">
            &copy; 2023 Quizeiro - Todos os direitos reservados.
        </div>
    </footer>

    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#logout').click(function(e) {
                e.preventDefault();
                $('#logout-form').submit();
            });
            $('#btnContact').click(function(){
                $(this).addClass('disabled');
                $(this).html('<span class="spinner-border spinner-border-sm"></span> Enviando...');
            });
        });
    </script>
</body>

</html>
