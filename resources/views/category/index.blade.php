@php
    /** @var \App\Models\Category[] $categories */
@endphp

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Categories') }}</div>
        <div class="card-body">

            <div class="form-group">
                <a href="{{ route('category.create') }}" class="btn btn-success">
                    <i class="fa fa-plus">&ensp;</i>
                    {{ __('Create') }}
                </a>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('No.') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration + (request()->query('page', 1) - 1) * 10 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-sm btn-primary float-left">
                                <i class="fa fa-edit">&ensp;</i>
                                {{ __('Edit') }}
                            </a>
                            <a href="#" onclick="deleteConfirm('delete-category-{{ $category->id }}')" class="btn btn-sm btn-danger ml-1">
                                <i class="fa fa-trash">&ensp;</i>
                                {{ __('Delete') }}
                            </a>
                            <form id="delete-category-{{ $category->id }}" action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $categories->links() }}
        </div>
    </div>
@endsection
