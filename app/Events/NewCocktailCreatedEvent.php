<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\User;
use App\Cocktail;

class NewCocktailCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $cocktail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Cocktail $cocktail)
    {
        $this->user = $user;
        $this->cocktail = $cocktail;
    }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
    //  */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
