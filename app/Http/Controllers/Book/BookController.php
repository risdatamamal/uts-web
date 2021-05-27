<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    public function table() {
        return view('books.table', [
            'books' => Book::latest()->paginate(),
        ]);
    }

    public function create() {
        return view('books.create', [
            'categories' => Category::get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:books,name',
            'cover' => request('cover') ? 'image|mimes:jpeg,png,gif' : '',
            'categories' => 'required|array'
        ]);

        $book = Book::create([
            'cover' => request('cover') ? request()->file('cover')->store('images/book') : null,
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        $book->categories()->sync(request('categories'));

        return back()->with('success', 'Book was created');
    }

    public function edit(Book $book)
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Category::get(),
        ]);
    }

    public function update(Book $book)
    {
        request()->validate([
            'name' => 'required|unique:books,name, ' . $book->id,
            'cover' => request('cover') ? 'image|mimes:jpeg,png,gif' : '',
            'categories' => 'required|array'
        ]);

        if(request('cover')) {
            Storage::delete($book->cover);
            $cover = request()->file('cover')->store('images/book');
        } elseif($book->cover) {
            $cover = $book->cover;
        } else {
            $cover = null;
        }

        $book->update([
            'cover' => $cover,
            'name' => request('name'),
            'slug' => Str::slug(request('name'))
        ]);

        $book->categories()->sync(request('categories'));

        return back()->with('success', 'Book was updated');
    }
}
