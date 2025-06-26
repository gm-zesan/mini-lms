<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\CourseEnrollmentMail;
use App\Models\Course;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendEnrolledStudentMail implements ShouldQueue
{
    use Queueable;
    private $course;

    /**
     * Create a new job instance.
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->course->enrollments()->where('status', 'approved')->chunk(50, function ($enrollments){
            foreach ($enrollments as $enrollment) {
                $student = $enrollment->student;
                Mail::to($student->email)->send(new CourseEnrollmentMail($student, $this->course));
            }
        });
    }
}
