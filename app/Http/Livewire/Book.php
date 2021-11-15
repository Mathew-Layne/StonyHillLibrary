<?php

namespace App\Http\Livewire;

use App\Models\Book as ModelsBook;
use App\Models\BookStatus;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    use WithPagination;
    public $author, $publisher, $title, $category, $status, $isbn, $year;

    public function bookform(){
        
        $this->dispatchBrowserEvent('bookform');
    }

    public function addBook(){

        $book = new ModelsBook;
        $book->author = $this->author;
        $book->publisher = $this->publisher;
        $book->title = $this->title;
        $book->category_id = $this->category;
        $book->book_status_id = $this->status;
        $book->isbn = $this->isbn;
        $book->year_published = $this->year;
        $book->save();

        dd($book->id);
        
        $this->dispatchBrowserEvent('closebookform');
    }

    public function render()
    {
    
        return view('livewire.book',[
            'books' => ModelsBook::with('assign', 'bookstatus', 'category')->paginate(5),
            'categories' => Category::all(),
            'statuses' => BookStatus::all(),
        ]);
    }
}
