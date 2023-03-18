<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//log
use App\Models\Log;

class LogController extends Controller
{
    //

    function index()
    {
        $logs = Log::all();

        return view('logs.index', ['logs' => $logs]);
    }
}
