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
     * @param \App\Http\Requests\StoreAlunosRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAlunosRequest $request) //Incluindo novo aluno
    {
        if (Alunos::create($request->all())) {

            return response()->json([
                'message' => 'Aluno Cadastrado com Sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao Cadastrar Aluno'
        ], 2404);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Alunos $alunos
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $aluno = Alunos::find($id);
        if (isset($aluno)) {
            return $aluno;
        }

        return \response()->json([
            'message' => 'Aluno não localizado no banco de dados'
        ], 404);
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
     * @param \App\Models\Alunos $alunos
     * @return int
     */
    public function destroy($id)
    {
        $deletou = Alunos::destroy($id); //retorna 0 ou 1

        return $deletou ? "Aluno excluído" : "";

    }
}
