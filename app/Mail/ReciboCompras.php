<?php

namespace App\Mail;

use App\Models\CartItem;
use App\Models\ShoppingCart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ReciboCompras extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ventas@tiendalte.com', 'TiendaLTE'),
            subject: 'Tu recibo de TiendaLTE',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.recibos',
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

    public function build()
    {
        $user = Auth::user();
        $shoppingCart = ShoppingCart::where('customer_id', $user->id)->first();
        $cartItems = CartItem::where('shopping_cart_id', $shoppingCart->id)->get();
        
        $subTotal = $cartItems->sum(function ($cartItem) {
            return $cartItem->distribution->price * $cartItem->quantity;
        });

        $igv = $subTotal * 0.18;

        return $this->view('emails.recibos', compact('user', 'shoppingCart', 'cartItems', 'subTotal', 'igv'));
    }
}