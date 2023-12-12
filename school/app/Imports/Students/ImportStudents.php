<?php

namespace App\Imports\Students;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportStudents implements WithHeadingRow,ToModel,SkipsEmptyRows, WithValidation
{
//    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }


    public function rules(): array
    {
        return  [
            'first_name'=>['required'],
            'last_name'=>['required'],
            'student_email_address'=>['required'],
            'nationality'=>['required'],
            'phone_number'=>['required'],
            'grade'=>['required'],
            'curriculum'=>['required'],
            'parent_email_address'=>['required'],
            'parent_phone_number'=>['required'],
            'national_number'=>['required'],
        ];
    }

    public function model(array $student)
    {
        if (empty($student['student_email_address']) || empty($student['name'])) {
            $this->invalidStudent_count++;
            $this->invalid_students[] = $student;
            return;
        }

        if (User::where('email', '=', trim($student['student_email_address']))->exists()) {
            $this->existStudent_count++;
            $this->exist_students[] = $student;
            return;
        }


    }
}
