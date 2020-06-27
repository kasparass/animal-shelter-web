<?php

namespace App\Http\Controllers;

use App\Gyvunas;
use App\User;
use Illuminate\Http\Request;
use test\Mockery\Stubs\Animal;


class GyvunasController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Gyvunas::where('user_id', auth()->user()->id)->paginate(10);
        //dd($animals);
        return view('gyvunas.reserve', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gyvunas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \request()->validate([
            'animal' => ['required', 'min:3', 'max:255'],
            'breed' => 'required',
            'age' => 'required|integer',
            'color' => 'required',
            'info' => 'required'
        ]);

        $animal = new Gyvunas();

        $animal->animal = \request('animal');
        $animal->breed = \request('breed');
        $animal->age = \request('age');
        $animal->sex = \request('sex');
        $animal->color = \request('breed');
        $animal->info = \request('age');
        $animal->user_id = auth()->user()->id;
        $animal->olduser = auth()->user()->id;

        $animal->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gyvunas  $gyvunas
     * @return \Illuminate\Http\Response
     */
    public function show(Gyvunas $gyvunas)
    {
        //$animal = Gyvunas::find($id);
        //dd($animal);
        return view('gyvunas.show', ['animal' => $gyvunas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gyvunas  $gyvunas
     * @return \Illuminate\Http\Response
     */
    public function edit(Gyvunas $gyvunas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gyvunas  $gyvunas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gyvunas $gyvunas)
    {
        //
    }

    public function modify($id){
        $animal = Gyvunas::find($id);
        $animal->user_id = auth()->user()->id;
        $animal->save();
        return redirect('home');
    }

    public function modifyUndo($id){
        $animal = Gyvunas::find($id);
        $animal->user_id = $animal->olduser;
        $animal->save();
        return redirect('home');
    }

    public function reserve()
    {
        //$animals = User::find(auth()->user()->id)->animals;
        $animals = Gyvunas::where('user_id', auth()->user()->id)->paginate(10);
        //dd($animals);
        return view('gyvunas.reserve', ['animals' => $animals]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gyvunas  $gyvunas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Gyvunas::find($id);
        $animal->delete();
        //$animal->save();
        return redirect('home');
    }
}
