<?php

namespace App\Mail;

use App\User;
use App\Cocktail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateCocktailEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cocktail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Cocktail $cocktail)
    {
        $this->user = $user;
        $this->cocktail = $cocktail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.cocktails.create');
    }
}
