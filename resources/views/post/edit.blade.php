@php
    /** @var \App\Models\Post $post */
    /** @var \App\Models\Category[] $categories */
@endphp

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Category edit') }}</div>
        <div class="card-body">
            <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>{{ __('Title') }}</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           value="{{ $post->title }}">
                    <span class="text-danger">@error('title') {{ $errors->first('title') }} @enderror</span>
                </div>

                <div class="form-group">
                    <label>{{ __('Description') }}</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">{{ $post->description }}</textarea>
                    <span class="text-danger">@error('description') {{ $errors->first('description') }} @enderror</span>
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control select2">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
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
