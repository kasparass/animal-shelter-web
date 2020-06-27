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
