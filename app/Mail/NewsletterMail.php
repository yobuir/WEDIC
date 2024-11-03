<?php

namespace App\Mail;



use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

use App\Models\Newsletter;
use App\Models\NewsletterSubscriber;
class NewsletterMail extends Mailable
{

    use Queueable, SerializesModels;

    public $newsletter;
    public $subscriber;

    public function __construct(Newsletter $newsletter, NewsletterSubscriber $subscriber)
    {
        $this->newsletter = $newsletter;
        $this->subscriber = $subscriber;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->newsletter->title,
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            replyTo: [
                new Address(config('mail.from.address'), config('mail.from.name')),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.newsletter',
            with: [
                'content' => $this->newsletter->content,
                'subscriberName' => $this->subscriber->name,
                'newsletter'=> $this->newsletter,
                'logo' => asset('logo/logo.png'), // Adjust path as needed
                'companyPhone' => config('company.phone', '+250795296952'),
                'companyEmail' => config('company.email', 'wedicltd@gmail.com'),
                'websiteUrl' => config('app.url'),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
