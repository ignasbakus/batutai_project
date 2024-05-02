<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ClientsController extends Controller
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        /*Fake users data*/
        //User::factory()->count(5)->create();

        /*Fake clients data*/
        //Client::factory()->count(10)->create();

        /*dd((object)[
            'log' => 'Labas as esu -> \App\Http\Controllers\ClientsController::index',
            'test' => Client::orWhere('email', '=', 'sk@sk.lt')->get()
        ]);*/


        return view('clients.clients', [
            'clients' => Client::all()
        ]);

    }

}
