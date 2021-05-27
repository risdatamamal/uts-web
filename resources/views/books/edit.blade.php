@extends('layouts.backend')

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2multiple').select2();
        });
    </script>

@endpush

@section('content')
    @include('alert')
    <div class="card">
        <div class="card-header">New Book</div>
        <div class="card-body">
            <form action="{{ route('books.edit', $book) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" name="cover" id="cover" class="form-control-file">
                    @error('cover')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value={{ old('name') ?? $book->name }} id="name" class="form-control">
                    @error('name')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categories">Choose Categories</label>
                    <select name="categories[]" id="categories" class="form-control select2multiple" multiple>
                        @foreach ($categories as $category)
                            <option {{ $book->categories()->find($category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories')
                        <div class="mt-2 text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
