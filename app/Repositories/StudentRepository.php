<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Students;

class StudentRepository implements StudentRepositoryInterface
{

    /**
     * @return mixed
     */
    public function getAllStudents()
    {
        return Students::all();
    }

    /**
     * @param $studentId
     * @return mixed
     */
    public function getStudentById($studentId)
    {
        return Students::FindOrFail($studentId);
    }

    /**
     * @param $studentId
     * @return mixed
     */
    public function deleteStudent($studentId)
    {
        Students::destroy($studentId);
    }

    /**
     * @param array $studentDetails
     * @return mixed
     */
    public function addStudent(array $studentDetails)
    {
        return Students::create($studentDetails);
    }

    /**
     * @param $studentId
     * @param array $newDetails
     * @return mixed
     */
    public function updateStudent($studentId, array $newDetails)
    {
        return Students::whereId($studentId)->update($newDetails);
    }

}
