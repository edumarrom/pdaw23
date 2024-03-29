<?php

namespace App\Mail\Admin;

use App\Models\Course;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseProposed extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $teacher;
    public $admin;

    /**
     * Create a new message instance.
     */
    public function __construct(Course $course, User $admin)
    {
        $this->course = $course;
        $this->teacher = $course->teacher;
        $this->admin = $admin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📕 Nueva propuesta de curso',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.admin.course-proposed',
            with: [
                'show' => route('admin.courses.show', $this->course),
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
