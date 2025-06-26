<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use MailerLite\MailerLite;

class MailerLiteService
{
    protected $MailerLite;


    public function __construct()
    {
        $this->MailerLite = new MailerLite(['api_key' => env('MAILERLITE_API_KEY')]);
    }


    public function addStudentToMailerLiteGroup($student, $groupId)
    {
        $subscriberId = $this->addStudentAsSubscriber($student);
        $this->MailerLite->groups->assignSubscriber($groupId, $subscriberId);
        $subscribers = $this->MailerLite->groups->getSubscribers($groupId);
        return $subscribers['body']['data'];
    }


    public function sendMailViaMailerLite($student, $course, $groupId, $emailContent)
    {
        $campaignData = [
            'name' => 'Course Enrollment: ' . $course->title,
            'type' => 'regular',
            'emails' => [
                [
                    'subject' => 'Course Enrollment Notification', 
                    'from_name' => 'Mini LMS',
                    'from' => 'gmzesan7767@gmail.com',
                    'reply_to' => 'gmzesan7767@gmail.com',
                    'content' => $emailContent,
                ],
            ],
            'groups' => [$groupId],
        ];
        try {
            $campaign = $this->MailerLite->campaigns->create($campaignData);
            $campaignId = $campaign['body']['data']['id'];
            $scheduleResponse = $this->MailerLite->campaigns->schedule($campaignId, ['delivery' => 'instant']);
            if ($scheduleResponse['status_code'] === 200) {
                Log::info("Campaign scheduled successfully for student: {$student->email}");
                return true;
            }
            Log::error("Failed to schedule campaign for student: {$student->email}");
            return false;
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    
    protected function addStudentAsSubscriber($student)
    {
        try {
            $subscriber = $this->MailerLite->subscribers->create([
                'email' => $student->email,
                'fields' => [
                    'name' => $student->name,
                ],
            ]);

            if ($subscriber['status_code'] == 201) {
                return $subscriber['body']['data']['id'];
            }
            return $this->MailerLite->subscribers->find($student->email)['body']['data']['id'];
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }


}
