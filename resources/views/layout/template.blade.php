<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Scrolling Nav - Start Bootstrap Template</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="#page-top">LOCADORA IFNC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('home')}}">HOME</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br><br><br>
        <!-- Header-->
        

    <div id="corpo" class="container mt-5 p-4 shadow-sm bg-white rounded">
    
    @error('valor')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('data_cadastro')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('ano')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('tipo')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('modelo')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('data_cadastro')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('foto')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Formulário de veículo -->
    @if (isset($veiculos) && $veiculos->id)
        <form action="{{ route('update', $veiculos) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
    @else
        <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data" >
    @endif
        @csrf

        <div class="mb-3">
            <label for="modelo" class="form-label">MODELO</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo', $veiculos->modelo ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">TIPO</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{ old('tipo', $veiculos->tipo ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="ano" class="form-label">ANO</label>
            <input type="number" name="ano" id="ano" class="form-control" value="{{ old('ano', $veiculos->ano ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="data_cadastro" class="form-label">CADASTRO</label>
            <input type="date" name="data_cadastro" id="data_cadastro" class="form-control" value="{{ old('data_cadastro', $veiculos->data_cadastro ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">VALOR/DIA</label>
            <input type="number" name="valor" id="valor" class="form-control" value="{{ old('valor', $veiculos->valor ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Foto do Veiculo</label>
            <input type="file" name="foto" id="foto" class="form-control"accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('new') }}" class="btn btn-secondary">Novo</a>
    </form>

    <hr>

    <!-- Formulário de busca -->
    <form action="{{ route('save') }}" method="GET" class="mb-4">
        <div class="mb-3">
            <label for="search" class="form-label">Buscar por Modelo</label>
            <input type="text" name="search" id="search" class="form-control">
        </div>

        <div class="mb-3">
            <label for="search2" class="form-label">Buscar por Tipo</label>
            <input type="text" name="search2" id="search2" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Buscar</button>
    </form>

    <!-- Resultados -->
    <h2>Resultados:</h2>
    <ul class="list-group">
        @foreach ($list as $veiculo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>{{ $veiculo->modelo }} - {{ $veiculo->tipo }} - {{ $veiculo->data_cadastro }}
                <img src="{{ asset('assets/images/'.$veiculo->foto) }}" alt=""  style="max-width: 200px; height: auto;">   
            
            </span>
                <div>
                    <a href="{{ route('edit', $veiculo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <a href="{{ route('delete', $veiculo) }}" class="btn btn-danger btn-sm ms-2">Deletar</a>
                              
                </div>
            </li>
        @endforeach
        <?php
        die();
        
        ?>
    </ul>

    <!-- Paginação -->
    <div class="mt-4">
        {{ $list->links() }}
    </div>
</div>


        </section>
        <br><br><br><br><br>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
