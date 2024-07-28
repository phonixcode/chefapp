<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $pdfPaths;

    public function __construct(Order $order, array $pdfPaths)
    {
        $this->order = $order;
        $this->pdfPaths = $pdfPaths;
    }

    public function build()
    {
        $mail = $this->view('emails.order_completed')
                     ->with(['pdfPaths' => $this->pdfPaths]);

        foreach ($this->pdfPaths as $pdf) {
            $mail->attach(storage_path('app/' . $pdf['path']));
        }

        return $mail;
    }
}
