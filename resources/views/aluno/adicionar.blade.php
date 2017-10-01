@extends('layouts.app')

@section('content')
    @include('commons.errors')
    <form action="{{ url('insere-aluno') }}" method="post">
       <div class="form-group">
           <label for="nome" class="control-label">Nome</label>
           <input name="nome" id="nome" class="form-control" />
       </div>
        <div class="form-group">
            <label for="endereco" class="control-label">Endereço</label>
            <input name="endereco" id="endereco" class="form-control" />
        </div>
        <div class="form-group">
            <button class="btn btn-default">Salva aluno</button>
        </div>
        {{ csrf_field() }}
    </form>
@endsection
