<?php

namespace App\Http\Controllers\Student;

use App\Grade\Grade;
use App\Http\Controllers\Controller;
use App\Student\Commands\CreateStudentCommand;
use App\Student\Repositories\Contracts\StudentRepositoryInterface;
use App\Student\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function showStudent(int $id, StudentRepositoryInterface $studentRepository)
    {
        try{
            return response()->json([
                'error' => false,
                'message'=> 'Student with id=' . $id,
                'item' => $studentRepository->findOrFail($id)
            ]);
        } catch(\Exception $e){
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function createStudent(Request $request, StudentRepositoryInterface $studentRepository)
    {
        try {
            $student = dispatch(new CreateStudentCommand(
                $request->get('name'),
//                $request->get('school_board_id'),
            ));

            return response()->json([
                'error' => false,
                'message' => 'New student was registered',
                'item' => $student
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

   public function create(Request $request)
   {
        $student = new Student($request->all());

        $totalScore = $request->math + $request->history + $request->biology + $request->technology;

        $student->average = $totalScore / 4;

        if($totalScore <= 7){
            $student->final_result = 'Fail';
        }else{
            $student->final_result = 'Pass';
        }

        $student->save();

       return response()->json([
           'error' => true,
           'message' => 'Успешно запишавте студент'
       ]);

   }
}
