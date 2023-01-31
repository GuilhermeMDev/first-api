<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Students;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository implements StudentRepositoryInterface
{

    /**
     * @return Collection
     */
    public function getAllStudents(): Collection
    {
        return Students::all();
    }

    /**
     * @param $studentId
     * @return string
     */
    public function getStudentById($studentId)
    {
        return Students::find($studentId);
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
