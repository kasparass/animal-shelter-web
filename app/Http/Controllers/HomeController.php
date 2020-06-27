<?php

namespace App\Http\Controllers;

use App\User;
use App\Gyvunas;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $animals = Gyvunas::paginate(10);
        return view('home', ['animals' => $animals]);
    }

    public function test(){
        return view('test');
    }

    public function getAnimals()
    {
        return Datatables::of(Gyvunas::query())->make(true);
    }
}
