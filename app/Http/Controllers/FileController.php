<?php

namespace App\Http\Controllers;

use App\Assignment_question;
use App\Http\Controllers\faculty\AssignmentController;

use App\Batch_detail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Studentbatch;
use App\Submission;
// use Illuminate\Http\Request;
use DB;
use App\User;
// use \PDF;
use Barryvdh\DomPDF\Facade as PDF;
// use App\Http\Controllers\PDF;
use Illuminate\Support\Facades\Auth;


class FileController extends Controller
{
    public function pdfview(Request $request)
    {

        // dd($request->assignment_id);
        $user = Auth::user();

        $Submittion_detail = Submission::select('name', 'enrollment', 'question_id', 'status', 'created_at')->where('assignment_id', $request->assignment_id)->where('is_deleted' , '0')->get();
        $batch_detail = Batch_detail::select('batch_name')->where('id', $request->batch_id)->first();
        $batch_student_detail = Studentbatch::select('enrollment')->where('batch_id', $request->batch_id)->get();
        $assignment_id = $request->assignment_id;

        $assignment_questions = Assignment_question::select('*')
        ->where('email', $user->email)
        ->where('assignment_id', $request->assignment_id)->where('is_deleted', '0')->get();

        // dd($batch_student_detail);

        $data = array(
            'Submittion_detail' => $Submittion_detail,
            'batch_detail' => $batch_detail,
            'batch_student_detail' => $batch_student_detail,
            'assignment_id' => $assignment_id,
            'assignment_questions' => $assignment_questions,
        );

        // view()->share(['Submittion_detail' => $Submittion_detail], [ 'batch_detail' => $batch_detail], ['batch_student_detail' => $batch_student_detail]);

        if ($request->has('download')) {
            $pdf = PDF::loadView('common.pdfview', $data);
            return $pdf->download('pdfview.pdf');
        }

        return view('common.pdfview', compact('Submittion_detail', 'batch_detail', 'batch_student_detail'));
    }
}
