@extends('layouts.app')

@section('content')
    <ul>
        <li><strong>Nome:</strong> {{ $aluno->nome }}</li>
        <li><strong>Endereço:</strong> {{ $aluno->endereco }}</li>
        <li><strong>Nome da mãe:</strong> {{ $aluno->nome_mae }}</li>
        <li><strong>Nome do pai:</strong> {{ $aluno->nome_pai }}</li>
        <li><strong>Telefone:</strong> {{ $aluno->telefone }}</li>
    </ul>
@endsection
