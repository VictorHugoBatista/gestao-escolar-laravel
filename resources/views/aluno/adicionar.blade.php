@extends('layouts.app')

@section('content')
    @include('commons.errors')
    <form action="{{ url('insere-aluno') }}" method="post">
        <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                   <label for="nome" class="control-label">Nome</label>
                   <input name="nome" id="nome" class="form-control" />
               </div>
                <div class="form-group">
                    <label for="endereco" class="control-label">Endereço</label>
                    <input name="endereco" id="endereco" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="telefone" class="control-label">Telefone</label>
                    <input name="telefone" id="telefone" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome-mae" class="control-label">Nome da mãe</label>
                    <input name="nome-mae" id="nome-mae" class="form-control" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome-pai" class="control-label">Nome do pai</label>
                    <input name="nome-pai" id="nome-pai" class="form-control" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-default">Salva aluno</button>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
@endsection
