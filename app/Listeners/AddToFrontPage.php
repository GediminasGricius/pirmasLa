<?php

namespace App\Listeners;

use App\Events\NewProductEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddToFrontPage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewProductEvent  $event
     * @return void
     */
    public function handle(NewProductEvent $event)
    {

       dd("Pridedu i pirma puslapi: ".$event->product->name);
    }
}
