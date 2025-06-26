<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function index()
    {
        $student = Session::get('student_id') ? User::find(Session::get('student_id')) : null;
        if(!$student){
            return redirect()->route('student.login')->with('error', 'You need to login to access this page.')->with('status', 'login');
        }
        $approvedEnrollments = $student->enrollments()->where('status', 'approved')->with('course')->get();
        $certificates = $approvedEnrollments->pluck('course')->filter(function ($course) {
            return $course->is_certificate_enabled == 1;
        });
        return view('student.certificate', compact('certificates', 'student'));
    }

    public function downloadCertificate($certificateId)
    {
        $student = Session::get('student_id') ? User::find(Session::get('student_id')) : null;
        if(!$student){
            return redirect()->route('student.login')->with('error', 'You need to login to access this page.')->with('status', 'login');
        }
        $approvedEnrollments = $student->enrollments()->where('status', 'approved')->with('course')->get();
        $courses = $approvedEnrollments->pluck('course')->where('is_certificate_enabled', 1);
        $course = $courses->where('id', $certificateId)->first();
        if(!$course){
            return redirect()->route('student.certificate')->with('error', 'Certificate not found.');
        }
        // $pdf = Pdf::loadView('student.certificate-pdf', ['course' => $course, 'student' => $student]);
        // return $pdf->download($course->title . '_certificate.pdf');
        $data = [
            [
                'quantity' => 1,
                'description' => '1 Year Subscription',
                'price' => '129.00'
            ]
        ];
        // $pdf = Pdf::loadView('student.certificate-pdf', ['data' => $data]);
        // return $pdf->download();
        return view('student.certificate-pdf', ['data' => $data]);
    }
}
