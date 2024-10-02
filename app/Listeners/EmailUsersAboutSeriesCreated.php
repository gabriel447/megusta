<?php

namespace App\Listeners;

use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use DateTime;
use App\Models\User;

class EmailUsersAboutSeriesCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SeriesCreatedEvent $event)
    {
        $userList = User::all();
        foreach ($userList as $index => $user){
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodesPerSeason,
            );
            $when = new DateTime();
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);

            // comando para executar a fila de email
            // php artisan queue:listen --tries=2
        }
    }
}
