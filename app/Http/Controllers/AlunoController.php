<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use Validator;

class AlunoController extends Controller
{
    /**
     * Rota de inserção de aluno acessado pelo formulário da rota 'inserir-alunos'.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function insereAluno(Request $request)
    {
        $validator = $this->validaInsereAluno($request->all());
        if (! $validator['result']) {
            return redirect('/adicionar-aluno')->withErrors($validator['validator']);
        }
        $aluno = new Aluno;
        $aluno->nome = $request->get('nome');
        $aluno->endereco = $request->get('endereco');
        $aluno->nome_mae = $request->get('nome-mae');
        $aluno->nome_pai = $request->get('nome-pai');
        $aluno->telefone = $request->get('telefone');
        $aluno->save();
        return redirect('/listar-alunos');
    }

    /**
     * Valida os dados passados no formulário de inserção de alunos.
     * @param $requestData Dados recebidos na requisição.
     * @return array Resultado da validação e objeto validator.
     */
    private function validaInsereAluno($requestData)
    {
       $validator = Validator::make($requestData, [
           'nome' => 'required',
           'endereco' => 'required',
           'telefone' => 'required',
       ]);
       return [
           'result' => ! $validator->fails(),
           'validator' => $validator,
       ];
    }

    /**
     * Rota de exibição de uma listagem com todos os alunos.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listarAlunos()
    {
        return view('aluno.listar', [
            'alunos' => Aluno::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
