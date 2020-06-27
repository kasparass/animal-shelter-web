@extends('layouts.app')

@section('content')
    <a href="{{route('home') }}" class="button button-alt" style="padding-left:25px;">Grįžti</a>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <div class="container">
        <form method="POST" action="/animals">
            @csrf
            <h>Pridėti naują gyvūną</h>
            <div class="field">
                <label class="label" for="animal">Gyvūnas</label>

                <div class="control">
                    <input class="input @error('animal') is-danger @enderror"
                           type="text"
                           name="animal"
                           id="animal"
                           value="{{ old('animal') }}">

                    @error('animal')
                    <p class="help is-danger">{{ $errors->first('animal') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="breed">Veislė</label>

                <div class="control">
                    <input class="input @error('breed') is-danger @enderror"
                           type="text"
                           name="breed"
                           id="breed"
                           value="{{ old('breed') }}">

                    @error('breed')
                    <p class="help is-danger">{{ $errors->first('breed') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="sex">Lytis</label>

                <div class="control">
                    <select name="sex" id="sex">
                        <option value="1">Patinas</option>
                        <option value="0">Patelė</option>
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="label" for="age">Amžius</label>

                <div class="control">
                    <input class="input @error('age') is-danger @enderror"
                           type="text"
                           name="age"
                           id="age"
                           value="{{ old('age') }}">

                    @error('age')
                    <p class="help is-danger">{{ $errors->first('age') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="color">Spalva</label>

                <div class="control">
                    <input class="input @error('color') is-danger @enderror"
                           type="text"
                           name="color"
                           id="color"
                           value="{{ old('color') }}">

                    @error('color')
                    <p class="help is-danger">{{ $errors->first('color') }}</p>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label class="label" for="info">Aprašymas</label>

                <div class="control">
                    <textarea class="textarea @error('info') is-danger @enderror" name="info" id="info">{{ old('info') }}</textarea>
                </div>

                @error('info')
                <p class="help is-danger">{{ $errors->first('info') }}</p>
                @enderror
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Pridėti</button>
                </div>
            </div>
        </form>
    </div>
    @endsection
