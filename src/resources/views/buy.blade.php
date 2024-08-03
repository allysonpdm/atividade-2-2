<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Ações</title>
    @vite('resources/css/buy.css')
</head>
<body>
    <div class="container">
        <h1>Compra de Ações</h1>

        @if(session('success'))
            <div style="color: #4caf50;">{{ session('success') }}</div>
        @endif

        <form action="" method="POST">
            @csrf
            <label for="acao">Selecione a Ação:</label>
            <select name="acao" id="acao">
                @foreach($acoes as $acao)
                    <option value="{{ $acao['nome'] }}">{{ $acao['nome'] }} - R$ {{ number_format($acao['preco'], 2, ',', '.') }}</option>
                @endforeach
            </select>

            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" min="1" required>

            <button type="submit" class="btn">Comprar</button>
        </form>

        <h2>Informações das Ações</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço (R$)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($acoes as $acao)
                    <tr>
                        <td>{{ $acao['nome'] }}</td>
                        <td>{{ number_format($acao['preco'], 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
