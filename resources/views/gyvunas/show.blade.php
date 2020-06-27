@extends('layouts.app')

@section('content')
    <a href="{{route('home') }}" class="button button-alt" style="padding-left:25px;">Grįžti</a>
    <div class="container">
        <h1>{{ $animal->animal }}</h1>
        <table class="table" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td><b>Veislė:</b></td>
                    <td> {{$animal->breed }} </td>
                </tr>

                <tr>
                    <td><b>Lytis:</b></td>
                    @if($animal->sex === 1)
                        <td> Patinas </td>
                    @else
                        <td> Patelė </td>
                    @endif
                </tr>

                <tr>
                    <td><b>Amžius:</b></td>
                    <td> {{$animal->age }} </td>
                </tr>

                <tr>
                    <td><b>Spalva:</b></td>
                    <td> {{$animal->color }} </td>
                </tr>

                <tr>
                    <td><b>Miestas:</b></td>
                    <td> {{$animal->user->city }} </td>
                </tr>

                <tr>
                    <td><b>Adresas:</b></td>
                    <td> {{$animal->user->address }} </td>
                </tr>

                <tr>
                    <td><b>Telefono numeris:</b></td>
                    <td> {{$animal->user->phoneNumber }} </td>
                </tr>

                <tr>
                    <td><b>Aprašymas:</b></td>
                    <td> {{$animal->info }} </td>
                </tr>

            </tbody>
        </table>
        @if(auth()->user()->privilege === 1 || auth()->user()->privilege === 3)
            @if(!($animal->user_id === auth()->user()->id))
                <form id="my_form" method="POST" action="{{ route('animals.modify', ['gyvunas' => $animal->id] ) }}">
                    @csrf
                    @method('PATCH')
                    <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="button button-alt">Rezervuoti gyvūną</a>
                </form>
            @endif
        @endif
    </div>
    @endsection
