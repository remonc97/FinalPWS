<?php
/**
 * Written by ChiaChintyaaa
 * Licensed under GNU General Public License v3.0
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace App\Http\Transformers;
use League\Fractal\TransformerAbstract;
use App\Http\Models\Student;

class StudentTransformer extends TransformerAbstract
{
    public function transform(Student $field){
        return [
            'students_id' => $field->id,
            'students_nim' => $field->nim,
            'students_name' => $field->name,
            'students_dateofbirth' => $field->dateofbirth,
            'students_address' => $field->address,
            'students_phonenumber' => $field->phonenumber,
            'students_gender' => $field->gender,
            'students_major' => $field->major,
        ];
    }
}