@extends('layouts.app')

@section('content')
    <ul>
        @if(isset($aluno->nome) and '' !== $aluno->nome)
        <li><strong>Nome:</strong> {{ $aluno->nome }}</li>
        @endif
        @if(isset($aluno->endereco) and '' !== $aluno->endereco)
        <li><strong>Endereço:</strong> {{ $aluno->endereco }}</li>
        @endif
        @if(isset($aluno->nome_mae) and '' !== $aluno->nome_mae)
        <li><strong>Nome da mãe:</strong> {{ $aluno->nome_mae }}</li>
        @endif
        @if(isset($aluno->nome_pai) and '' !== $aluno->nome_pai)
        <li><strong>Nome do pai:</strong> {{ $aluno->nome_pai }}</li>
        @endif
        @if(isset($aluno->telefone) and '' !== $aluno->telefone)
        <li><strong>Telefone:</strong> {{ $aluno->telefone }}</li>
        @endif
    </ul>
    @if(0 < $aluno->boletims->count())
        <table class="table table-striped">
           <thead>
               <tr>
                   <th>Matéria</th>
                   <th>Nota</th>
                   <th>Faltas</th>
               </tr>
           </thead>
           <tbody>
                @foreach($aluno->boletims as $boletim)
                    <tr>
                        <td>{{ $boletim->materia }}</td>
                        <td>{{ $boletim->nota }}</td>
                        <td>{{ $boletim->faltas }}</td>
                    </tr>
                @endforeach
           </tbody>
        </table>
    @endif
@endsection
