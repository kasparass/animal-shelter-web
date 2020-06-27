@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <th>Gyvūnas</th>
                        <th>Veislė</th>
                        <th>Lytis</th>
                        <th>Amžius</th>
                        <th>Spalva</th>
                        </thead>
                        <tbody>
                        @foreach($animals as $animal)
                            <tr>
                                <td><a href="/animals/{{$animal->id}}">{{$animal->animal }}</a></td>
                                <td> {{$animal->breed }} </td>
                                @if($animal->sex === 1)
                                    <td> Patinas </td>
                                @else
                                    <td> Patelė </td>
                                @endif
                                <td> {{$animal->age }} </td>
                                <td> {{$animal->color }} </td>
                                @if(auth()->user()->privilege === 3 || auth()->user()->privilege === 1)
                                    <td>
                                        <form id="my_form" method="POST" action="{{ route('animals.modifyUndo', ['gyvunas' => $animal->id] ) }}">
                                            @csrf
                                            @method('PATCH')
                                            <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="button button-alt">Atšaukti rezervaciją</a>
                                        </form>
                                    </td>
                                @endif
                                @if(auth()->user()->privilege === 2 || auth()->user()->privilege === 3)
                                    <td>

                                        <form id="my_form2" method="POST" action="{{ route('animals.destroy', ['gyvunas' => $animal->id] ) }}">
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:{}" onclick="confirm('Press a button!'); document.getElementById('my_form2').submit(); " class="button button-alt" id="del">Išimti gyvūną</a>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <p class="center">{{ $animals->links() }}</p>
                </div>
            </div>
        </div>
    </div>
    @endsection
