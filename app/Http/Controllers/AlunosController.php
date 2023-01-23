<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunosRequest;
use App\Http\Requests\UpdateAlunosRequest;
use App\Models\Alunos;
use Illuminate\Http\Response;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Alunos::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlunosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlunosRequest $request) //Incluindo novo aluno
    {
        return Alunos::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Alunos::findOrFail($id); //Só com o find, ele retorna código 200 mesmo que nao haja o valor no banco, com o OrFail, ele retorno o 404 caso não exista o item no banco de dados
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAlunosRequest $request
     * @param Alunos $alunos
     * @param $id
     * @return Response
     */
    public function update(UpdateAlunosRequest $request, $id)
    {
        $aluno = Alunos::findOrFail($id);

        $aluno->update($request->all());

        return $aluno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alunos  $alunos
     * @return int
     */
    public function destroy($id)
    {
        $deletou = Alunos::destroy($id); //retorna 0 ou 1

        return $deletou ? "Aluno excluído" : "";

    }
}
