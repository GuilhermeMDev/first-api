<?php

namespace App\Interfaces;

Interface StudentRepositoryInterface
{
    public function getAllStudents();
    public function getStudentById($studentId);
    public function deleteStudent($studentId);
    public function addStudent(array $studentDetails);
    public function updateStudent($studentId, array $newDetails);
}
