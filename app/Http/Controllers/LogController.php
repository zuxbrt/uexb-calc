<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $class = new LogViewerController();
        return $class->index();
    }
}
