<?php

namespace App\Mail\user;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public string $paymentLink;
    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, string $paymentLink)
    {
        $this->order = $order;
        $this->paymentLink = $paymentLink;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('uzsakymai@op-op.lt', 'OP-OP batutai'),
            replyTo: [
                new Address('uzsakymai@op-op.lt', 'OPOP LT administratorius'),
            ],
            subject: 'Užsakymas pateiktas',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.user.orders.order-placed',
            with: [
                'order' => $this->order,
                'paymentLink' => $this->paymentLink,
            ],
            //text: 'mail.orders.order-placed'
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
