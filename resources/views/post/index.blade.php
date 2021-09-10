@php
    /** @var \App\Models\Post[] $posts */
    /** @var \App\Models\Category[] $categories */
@endphp

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Posts') }}</div>
        <div class="card-body">

            <div class="form-group">
                <a href="{{ route('post.create') }}" class="btn btn-success">
                    <i class="fa fa-plus">&ensp;</i>
                    {{ __('Create') }}
                </a>
            </div>

            <form action="{{ route('post.index') }}" method="get">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="title" value="{{ request()->query('title') }}">
                    </div>

                    <div class="col-md-4 form-group">
                        <label>{{ __('Category') }}</label>
                        <select name="category_id" class="select2">
                            <option value="">-</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request()->query('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label>&ensp;</label><br>
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-search">&ensp;</i>
                            {{ __('Filter') }}
                        </button>
                    </div>
                </div>
            </form>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('No.') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration + (request()->query('page', 1) - 1) * 10 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->description, 15) }}</td>
                        <td>{{ $post->category->name ?? '' }}</td>
                        <td>
                            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-primary btn-sm float-left">
                                <i class="fa fa-edit">&ensp;</i>
                                {{ __('Edit') }}
                            </a>
                            <a href="#" onclick="deleteConfirm('delete-post-{{ $post->id }}')" class="btn btn-sm btn-danger ml-1">
                                <i class="fa fa-trash">&ensp;</i>
                                {{ __('Delete') }}
                            </a>
                            <form id="delete-post-{{ $post->id }}" action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $posts->links() }}
        </div>
    </div>
@endsection
