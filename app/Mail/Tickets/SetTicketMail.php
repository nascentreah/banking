<?php

namespace App\Mail\Tickets;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetTicketMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $ticket;

    /**
     * Create a new message instance.
     *
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket  = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $user = User::find($this->ticket->user_id);

//        dd(config('app.name'));

        return $this->subject('Set password')->markdown('mails.tickets.set-ticket',[
            'name' => $user->name,
            'subject' => $this->ticket->subject,
            'organisation' => config('app.name'),
            'Ticket ID' => $this->ticket->ticket_id,
            'created_at' => $this->ticket->created_at,
        ]);
    }
}
