<?php

namespace App\Http\Controllers;

use App\Http\Models\Student;
use App\Http\Transformers\StudentTransformer;
use Illuminate\Http\Request;
use Mockery\Exception;
use Dingo\Api\Routing\Helpers;

class StudentController extends Controller
{
    use Helpers;

    public function showAll(){
        $students = Student::all();

        if($students){
            return $this->response->collection($students,new StudentTransformer);
        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }

    }
    public function show($id){
        try{
            $students = Student::find($id);
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        if($students){
            return $this->response->item($students,new StudentTransformer);
        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }

    }
    public function store(Request $request){
        $data = $request->only([
            'students_nim','students_name','students_dateofbirth',
            'students_address','students_phonenumber','students_gender','students_major'
        ]);

        $students = new Student([
            'nim' => $data['students_nim'],
            'name' => $data['students_name'],
            'dateofbirth' => $data['students_dateofbirth'],
            'phonenumber' => $data['students_phonenumber'],
            'address' => $data['students_address'],
            'gender' => $data['students_gender'],
            'major' => $data['students_major']
        ]);

        try{
            $students->save();
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        $this->response->created();

        $this->response->error('data berhasil diinsert',200);

    }
    public function update($id,Request $request){
        try{
            $students = Student::find($id);
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        $data = $request->only([
            'students_nim','students_name','students_dateofbirth',
            'students_address','students_phonenumber','students_gender','students_major'
        ]);

        $students->fill([
            'nim' => $data['students_nim'],
            'name' => $data['students_name'],
            'dateofbirth' => $data['students_dateofbirth'],
            'phonenumber' => $data['students_phonenumber'],
            'address' => $data['students_address'],
            'gender' => $data['students_gender'],
            'major' => $data['students_major']
        ]);

        try{
            $students->update();
        }catch (Exception $e){
            $this->response->error($e,500);
        }
        $this->response->error('data berhasil diubah',200);

    }
    public function destroy($id){
        try{
            $students = Student::find($id);
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        try{
            $students->delete();
        }catch (Exception $e){
            $this->response->error($e,500);
        }
        $this->response->noContent();
        $this->response->error('data berhasil dihapus',200);
    }
}
