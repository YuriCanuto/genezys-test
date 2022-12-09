<?php

namespace App\Observers;

use App\Models\Adresses;
use Illuminate\Support\Str;

class AddressObserver
{
    /**
     * Handle the Adresses "created" event.
     *
     * @param  \App\Models\Adresses  $adresses
     * @return void
     */
    public function creating(Adresses $adresses)
    {
        $adresses->uuid = Str::uuid()->toString();
    }
}
