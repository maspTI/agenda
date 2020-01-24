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
                            {{-- <td>{{ $user->role ?? '' }}</td> --}}
                        </tr>
                        <tr>
                            <th>Depto.</th>
                            {{-- <td>{{ $user->department ?? '' }}</td> --}}
                        </tr>
                        <tr>
                            <th>Matrícula/CPF</th>
                            {{-- <td>{{ $user->registration_number ?? '' }}</td> --}}
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
                <p class="text-justify">Declaro ter recebido do Museu de Arte de São Paulo Assis Chateaubriand (“MASP”), a título de empréstimo, o equipamento descrito neste Termo de Responsabilidade, comprometendo-me a mantê-lo em perfeito estado de conservação, ciente de que:</p>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <ol>
                    <li class="text-justify">Cumprirei com as Normas de Utilização de Aparelhos Celulares (Anexo I).</li>
                    <li class="text-justify">Em caso de roubo ou furto do aparelho, o MASP providenciará a reposição do equipamento sem cobrança adicional de valores ao colaborador, que deverá notificar por escrito o Museu mediante a apresentação do respectivo Boletim de Ocorrência em até 48 (quarenta e oito) horas úteis.</li>
                    <li class="text-justify">Nos casos em que o equipamento for danificado ou inutilizado por uso inadequado, negligência ou em caso de extravio, o MASP providenciará a substituição do equipamento por outro similar ou equivalente disponível no mercado, e cobrará do colaborador o valor correspondente à reposição.</li>
                    <li class="text-justify">No caso de rescisão do meu contrato de trabalho, o equipamento será devolvido completo, em perfeito estado de conservação, considerando-se o tempo de vida útil do equipamento, ao Departamento de Tecnologia de Informação do Museu.</li>
                    <li class="text-justify">O MASP providenciará a assistência técnica e o apoio necessário para o uso corrente do equipamento.</li>
                </ol>
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
        <div class="row footer">
            <div class="col-md-12 d-flex justify-content-between">
                <span class="footer-museu">MUSEU DE ARTE DE SÃO PAULO ASSIS CHATEAUBRIAND</span>
                <span class="footer-endereco"> Av Paulista, 1578 01310-200 São Paulo SP Brasil T +55 11 31495959 www.masp.org.br</span>
            </div>
        </div>
    </div>
    <div class="pagina">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-right masp-logo">MASP</h1>
            </div>
            <div class="col-md-12 cabecalho">
                <h6 class="text-center cabecalho--titulo">Anexo I</h6>
                <h6 class="text-center cabecalho--titulo">NORMAS DE UTILIZAÇÃO DE APARELHOS CELULARES</h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <p class="text-justify">Declaro que utilizarei o aparelho celular corporativo, fornecido a título de empréstimo pelo Museu de Arte de São Paulo Assis Chateaubriand (“MASP”) para meu uso, ciente e comprometido em honrar as seguintes Normas de Utilização:</p>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <ol>
                    <li class="text-justify">A utilização do aparelho celular corporativo constitui ferramenta de trabalho, destinada ao atendimento das necessidades profissionais do(a) colaborador(a).</li>
                    <li class="text-justify">O MASP se reserva o direito de solicitar a posse dos aparelhos em caso de necessidade, seja para reparo, substituição ou inutilização, dispensada justificativa prévia.</li>
                    <li class="text-justify">Juntamente com o aparelho será disponibilizado plano operado pela companhia VIVO, que não poderá, em nenhuma hipótese sem a prévia autorização por escrito da Diretoria, ser alterado pelo(a) colaborador(a).</li>
                    <li class="text-justify">Alcançado o limite mensal de 1GB do pacote de dados pelo(a) colaborador(a), este será automaticamente reduzido. Recomenda-se, portanto, a utilização da rede WIFI disponibilizada gratuitamente pelo MASP durante todo o período em que estiver nas dependências do Museu.</li>
                    <li class="text-justify">Para realização de chamadas interurbanas, o(a) colaborador deverá utilizar o código 15 da operadora VIVO, inserido previamente ao DDD. As chamadas interurbanas realizadas com o código 15 estão livres de tarifação.</li>
                    <li class="text-justify">O(A) colaborador(a) não está autorizado(a) a realizar chamadas interurbanas por meio de outras operadoras. Caso descumprir, obriga-se a arcar com os custos adicionais que eventualmente incorrer.</li>
                    <li class="text-justify">Em caso de utilização do aparelho fora do país, o pedido justificado para liberação de roaming de dados deverá ser encaminhado para o Departamento de Tecnologia de Informação e autorizado pela Diretoria.</li>
                    <li class="text-justify">Toda informação relacionada às atividades do MASP é sigilosa e o(a) colaborador(a) tem o dever de investir esforços para preservar o sigilo de informação confidencial e de quaisquer outras informações que possam prejudicar as atividades do Museu, seus patrocinadores ou parceiros.</li>
                </ol>
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
