<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Swift_Image;
class SendResetCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $code;
    public $imageCid;
    public function __construct($code )
    {
        //
        $this->code= $code;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Reset Code',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        //$imagePath = public_path('assets/images/logo-bonr.png');

        return $this->view('authentification.reset_password')
                    ->subject('Send Reset Code')
                    /*->with(['code' => $this->code])
                    ->attach($imagePath, [
                        'as' => 'logo-bonr.png',
                        'mime' => 'image/png',
                    ])*/
                    ->withSwiftMessage(function ($message) {
                       // $imagePath = public_path('assets/images/logo-bonr.png');
                      //  $this->imageCid = $message->embed($imagePath);
                    });
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
