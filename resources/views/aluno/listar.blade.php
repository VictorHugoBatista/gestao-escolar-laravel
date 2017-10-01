@extends('layouts.app')

@section('content')
    @if(0 < count($alunos))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tboody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->endereco }}</td>
                    </tr>
                @endforeach
            </tboody>
        </table>
    @endif
@endsection
