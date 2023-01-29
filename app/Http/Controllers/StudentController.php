<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Models\Students;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index() //Listagem completa de todos os Alunos cadastrados no sistema.
    {
        $list = Students::all();

        if ($list || !isset($list)){
            return $list;
        }
        return response()->json([
            'message' => 'Erro ao listar Alunos'
        ], 404);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStudentsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreStudentsRequest $request) //Incluindo novo aluno
    {
        if (Students::create($request->all())) {

            return response()->json([
                'message' => 'Aluno Cadastrado com Sucesso.'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao Cadastrar Aluno'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Students $alunos
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $student = Students::find($id);
        if (isset($student)) {
            return $student;
        }

        return \response()->json([
            'message' => 'Aluno não localizado no banco de dados'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentsRequest $request
     * @param $id
     * @return Response
     */
    public function update(UpdateStudentsRequest $request, $id)
    {
        $student = Students::findOrFail($id);

        $student->update($request->all());

        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Students $alunos
     * @return int
     */
    public function destroy($id)
    {
        $deleted = Students::destroy($id); //return 0 ou 1

        return $deleted ? "Deleted Student" : "";

    }
}
