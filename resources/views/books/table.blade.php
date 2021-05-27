@extends('layouts.backend')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Categories</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $index => $book)
                <tr>
                    <td>{{ $books->count() * ($books->currentPage() - 1) + $loop->iteration }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->categories()->get()->implode('name', ', ') }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Edit</a>
                        <div endpoint="{{ $book->name }}" class="delete d-inline"></div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
@endsection
