<?php

namespace App\Mail;

use App\Models\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LessonCommented extends Mailable
{
    use Queueable, SerializesModels;

    public $lesson;
    public $course;
    public $teacher;

    /**
     * Create a new message instance.
     */
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
        $this->course = $lesson->section->course;
        $this->teacher = $this->course->teacher;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '💬 Nuevo comentario en tu curso',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.lesson-commented',
        with: [
                'learn' => route('courses.learn', [$this->course, $this->lesson]),
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
