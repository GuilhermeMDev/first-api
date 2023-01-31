<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Interfaces\StudentRepositoryInterface;
use App\Models\Students;
use App\Repositories\StudentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class StudentController extends Controller
{

//    private StudentRepositoryInterface $studentRepository;
//
//    public function __construct(StudentRepository $studentRepository = null)
//    {
//
//        $this->$studentRepository = $studentRepository;
//    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() //Listagem completa de todos os Alunos cadastrados no sistema.
    {
        $student = new StudentRepository();
        return response()->json([
            'data' => $student->getAllStudents()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStudentsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreStudentsRequest $request): JsonResponse//Incluindo novo aluno
    {
        $student = new StudentRepository();

        $studentDetails = $request->only([
            'name',
            'age'
        ]);

        return response()->json([
            'data' => $student->addStudent($studentDetails)
        ], ResponseAlias::HTTP_CREATED );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Students $alunos
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(UpdateStudentsRequest $request): JsonResponse
    {
        $student = new StudentRepository();

        $studentId = $request->route('id');

        return response()->json([
            'data' => $student->getStudentById($studentId)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentsRequest $request
     * @param $id
     * @return Response
     */
    public function update(UpdateStudentsRequest $request): JsonResponse
    {
        $student = new StudentRepository();

        $studentId = $request->route('id');

        $studentDetails = $request->only([
            'name',
            'age'
        ]);

        return response()->json([
            'data' => $student->updateStudent($studentId, $studentDetails)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Students $alunos
     * @return int
     */
    public function destroy(UpdateStudentsRequest $request): JsonResponse
    {
        $student = new StudentRepository();

        $studentId = $request->route('id');
        $student->deleteStudent($studentId);

        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);

    }
}
