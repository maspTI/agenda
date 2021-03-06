<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Termo de devolução {{ $user->nome }}</title>
    <link rel="stylesheet" href="{{ secure_asset('css/term.css') }}">
    <style>
        @font-face{font-family:'FuturaStd';font-style:normal;src:local("FuturaStd"),local("FuturaStd"),url(/fonts/futura/FuturaStd-Book.otf)}
        @font-face{font-family:'FuturaStdBold';font-style:normal;src:local("FuturaStdBold"),local("FuturaStdBold"),url(/fonts/FuturaStd-Bold.woff2)}
    </style>
</head>
<body>
    <div class="pagina">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-right masp-logo">MASP</h1>
            </div>
            <div class="col-md-12 cabecalho">
                <h6 class="text-center cabecalho--titulo">Termo de devolução</h6>
                <h6 class="text-center cabecalho--titulo">de equipamentos corporativos</h6>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-md-12">
                <div class="font-weight-bold id">Identificação do(a) Colaborador(a):</div>
            </div>
            <div class="col-md-12">
                <table border='1' class="mt-3">
                    <tbody>
                        <tr>
                            <th>Nome</th>
                            <td>{{ $user->nome }}</td>
                        </tr>
                        <tr>
                            <th>Função</th>
                            <td>{{-- {{ $user->role ?? '' }} --}}</td>
                        </tr>
                        <tr>
                            <th>Depto.</th>
                            <td>{{-- {{ $user->department ?? '' }} --}}</td>
                        </tr>
                        <tr>
                            <th>Matrícula/CPF</th>
                            <td>{{-- {{ $user->registration_number ?? '' }} --}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-row mt-4">
            <div class="col-md-12 mb-2">
                <div class="font-weight-bold id">Descrição do equipamento:</div>
            </div>
            <div class="col-md-12 mt-1">
                <table border='1'>
                    <tbody>
                        <tr>
                            <th>Descrição</th>
                            <td>Smartphone {{ $phone->brand }} Modelo {{ $phone->model }}</td>
                        </tr>
                        <tr>
                            <th>Modelo</th>
                            <td>{{ $phone->brand . ' ' . $phone->model }}</td>
                        </tr>
                        <tr>
                            <th>Acessórios</th>
                            <td>Fone de ouvido; Carregador; Cabo USB;</td>
                        </tr>
                        <tr>
                            <th>Número Serial</th>
                            <td>{{ $phone->serial_number }}</td>
                        </tr>
                        <tr>
                            <th>Número telefone</th>
                            <td>{{ substr_replace(substr_replace($phone->phone_number_1, '-', -4, 0), ' ', 2, 0) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <p class="text-justify">Declaro e confirmo a devolução do equipamento descrito no presente Termo, cedido pelo Museu de Arte de São Paulo Assis Chateaubriand, a título de empréstimo.</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <p>São Paulo, {{ $date->day . ' de ' . ucfirst($date->getTranslatedMonthName()) . ' de ' . $date->year }}.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <p class="text-center assinatura"></p>
                <p class="text-center">{{ $user->nome }}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <p class="text-center assinatura"></p>
                <p class="text-center">MUSEU DE ARTE DE SÃO PAULO ASSIS CHATEAUBRIAND</p>
                <p class="text-center">[p. Retana Toletdo Geo]</p>
            </div>
        </div>
        <div class="row footer">
            <div class="col-md-12 d-flex justify-content-between">
                <span class="footer-museu">MUSEU DE ARTE DE SÃO PAULO ASSIS CHATEAUBRIAND</span>
                <span class="footer-endereco"> Av Paulista, 1578 01310-200 São Paulo SP Brasil T +55 11 31495959 www.masp.org.br</span>
            </div>
        </div>
    </div>
</body>
</html>
