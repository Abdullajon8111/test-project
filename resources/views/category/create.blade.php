@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Category create') }}</div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    <span class="text-danger">@error('name') {{ $errors->first('name') }} @enderror</span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save">&ensp;</i>
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
