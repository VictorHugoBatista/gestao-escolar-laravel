@extends('layouts.app')

@section('content')
    @if(0 < count($alunos))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tboody>
                @foreach($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->endereco }}</td>
                        <td>
                            <a class="btn btn-default" href="/aluno/{{ $aluno->id }}">
                                Mais detalhes
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tboody>
        </table>
    @endif
@endsection
