<?php

namespace App\Logic\chocie;

use App\Models\politicParty;

class politicPartyLogic
{
    public function all()
    {
        return politicParty::with('chocie')->get();
    }
}
