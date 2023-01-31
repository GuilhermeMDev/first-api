<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Interfaces\StudentRepositoryInterface;
use App\Models\Students;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class StudentController extends Controller
{

    private StudentRepositoryInterface $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() //Listagem completa de todos os Alunos cadastrados no sistema.
    {
        return response()->json([
            'data' => $this->studentRepository->getAllStudents()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreStudentsRequest $request
     * @return JsonResponse
     */
    public function store(StoreStudentsRequest $request): JsonResponse//Incluindo novo aluno
    {

        $studentDetails = $request->only([
            'name',
            'age'
        ]);

        return response()->json([
            'data' => $this->studentRepository->addStudent($studentDetails)
        ], ResponseAlias::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Students $alunos
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {

        $studentId = $request->route('id');

        $data = $this->studentRepository->getStudentById($studentId);

        if ($data) {
            return response()->json([
                'data' => $data
            ], ResponseAlias::HTTP_ACCEPTED);
        }

        return response()->json([
        ], ResponseAlias::HTTP_NO_CONTENT);
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

        $studentId = $request->route('id');

        $studentDetails = $request->only([
            'name',
            'age'
        ]);

        $data = $this->studentRepository->updateStudent($studentId, $studentDetails);

        if ($data == 1) return response()->json([
            'message' => 'Update completed'
        ], ResponseAlias::HTTP_OK);

        if ($data == 0) return response()->json([
            'message' => 'Student not found.'
        ], ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StoreStudentsRequest $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {

        $studentId = $request->route('id');
        $this->studentRepository->deleteStudent($studentId);

        return response()->json(null, ResponseAlias::HTTP_NO_CONTENT);

    }
}
