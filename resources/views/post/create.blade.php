@php /** @var \App\Models\Category[] $categories */ @endphp

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Post create') }}</div>
        <div class="card-body">
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>{{ __('Title') }}</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    <span class="text-danger">@error('title') {{ $errors->first('title') }} @enderror</span>
                </div>

                <div class="form-group">
                    <label>{{ __('Description') }}</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"></textarea>
                    <span class="text-danger">@error('description') {{ $errors->first('description') }} @enderror</span>
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control select2">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}0</option>
                        @endforeach
                    </select>
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
