<?php

namespace App\Http\Controllers;

use App\Logic\chocie\politicPartyLogic;
use Illuminate\Http\Request;

class PoliticPartyController extends Controller
{
    private $PoliticParty;

    public function __construct()
    {
        $this->PoliticParty = new politicPartyLogic();
    }
    public function index()
    {
        return $this->PoliticParty->all();
    }
}
