<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);   
            color: white;
            width: 100%;
        }
        .box {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        legend {
            text-align: center;
            padding: 10px;
        }
        .form-control {
            background-color: transparent !important;
            border: none ;
            border-bottom: 1px solid white;
            color: white !important;
            color: black;
            padding: 0.375rem 0.75rem !important;
            letter-spacing: 2px;
        }
        .btn {
            width: 100%;
            height: 50px;
            background: linear-gradient(to top, #00154c, #12376e, #23487f);
            color: #fff;
            border-radius: 50px;
            border: none;
            outline: none;
            cursor: pointer;
            position: relative;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }
        .btn span {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: top 0.5s;
        }
        .btn-text-one {
            position: absolute;
            width: 100%;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            color: white;
        }
        .btn-text-two {
            position: absolute;
            color: white;
            width: 100%;
            top: 150%;
            left: 0;
            transform: translateY(-50%);
        }

        .btn:hover .btn-text-one {
            top: -100%;
        }

        .btn:hover .btn-text-two {
            top: 50%;
        }

        .form-group {
            position: relative;
        }

        .btn-primary {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">        
        @if(session('teste'))
            <div class="alert alert-success">
                {{ session('teste') }}
            </div>
        @endif
        
        @if(session('erro'))
            <div class="alert alert-danger">
                {{ session('erro') }}
            </div>
        @endif
        
        <div class="box">
            <form class="w-50" action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $cliente ? $cliente->id : '' }}">
                <fieldset class="border p-4 mb-4">
                    <legend class="w-auto">Cadastro do Cliente</legend>
                    <div class="form-group">
                        <label for="nome" class="labelInput">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $cliente ? $cliente->nome : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $cliente ? $cliente->data_nascimento : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP:</label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep', $cliente ? $cliente->cep : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $cliente ? $cliente->endereco : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número:</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero', $cliente ? $cliente->numero : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro:</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ old('bairro', $cliente ? $cliente->bairro : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade', $cliente ? $cliente->cidade : '') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="uf">UF:</label>
                        <input type="text" class="form-control" id="uf" name="uf" value="{{ old('uf', $cliente ? $cliente->uf : '') }}" required>
                    </div>
                    <button type="submit" class="btn">
                        <span class="btn-text-one">
                            {{ $cliente ? 'Editar cliente' : 'Cadastrar cliente' }}
                        </span>
                        <span class="btn-text-two">
                            {{ $cliente ? 'Editar!' : 'Cadastrar!' }}
                        </span>
                    </button>
                </fieldset>
            </form>
        </div>

        <h2 class="mt-5">Lista de Clientes</h2>
        <table class="table text-light">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>CEP</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>UF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->data_nascimento }}</td>
                        <td>{{ $cliente->cep }}</td>
                        <td>{{ $cliente->endereco }}</td>
                        <td>{{ $cliente->numero }}</td>
                        <td>{{ $cliente->bairro }}</td>
                        <td>{{ $cliente->cidade }}</td>
                        <td>{{ $cliente->uf }}</td>
                        <td>
                            <a style="color:#fff" href="{{ route('welcome', ['edit' => $cliente->id]) }}">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $('#cep').on('blur', function() {
            var cep = $(this).val().replace(/\D/g, '');
            if (cep.length === 8) {
                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                    if (!('erro' in data)) {
                        $('#endereco').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.localidade);
                        $('#uf').val(data.uf);
                    }
                });
            }
        });
    </script>
</body>
</html>
