<div class="container-fluid">

    <table>
        <thead>
        <tr>
            <th>Tipo de Evento</th>
            <th>Classificacão Etaria</th>
            <th>Nome</th>
            <th>descricao</th>
            <th>Radialistas</th>
            <th>Dia e hora do Programa</th>
        </tr>
        </thead>

        <tbody>
        @foreach($programas as $prog)
                <tr>
                    <td>{{ $prog->evento->nome }}</td>
                    <td>{{ $prog->classificacao->idade }}</td>
                    <td>{{ $prog->nome }}</td>
                    <td>{{ $prog->descricao }}</td>
                    <td>
                       @foreach($prog->programa_radialistas as $rad)
                       <li>{{ $rad->radialista->nome }}</li>
                       @endforeach
                    </td>
                    <td>{{ $prog->dia_hora }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
