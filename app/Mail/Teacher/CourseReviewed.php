<?php

namespace App\Mail\Teacher;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseReviewed extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $teacher;

    /**
     * Create a new message instance.
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
        $this->teacher = $this->course->teacher;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⭐ Nueva valoración en tu curso',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.teacher.course-reviewed',
            with: [
                'reviews' => route('courses.show', $this->course) . '#reviews',
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
