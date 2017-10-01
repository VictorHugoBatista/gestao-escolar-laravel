<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class AlunoController extends Controller
{
    public function insereAluno(Request $request)
    {
        $aluno = new Aluno;
        $aluno->nome = $request->get('nome');
        $aluno->endereco = $request->get('endereco');
        $aluno->save();
        return redirect('/adicionar-aluno');
    }
}
