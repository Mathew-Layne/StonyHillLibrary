<div>

    <div class="mt-20 ">
        <div class="text-gray-700 font-bold text-3xl mt-8 mb-4">
            <h1>Books</h1>
        </div>
    
        <x-table.table>
            <x-table.thead>
    
                <x-table.table-head>Title</x-table.table-head>
                <x-table.table-head>Author</x-table.table-head>
                <x-table.table-head>Publisher</x-table.table-head>
                <x-table.table-head>Year Published</x-table.table-head>
                <x-table.table-head>Category</x-table.table-head>
                <x-table.table-head>ISBN</x-table.table-head>
                <x-table.table-head>Status</x-table.table-head>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($books as $book)
                <x-table.table-row>
                    <x-table.table-data responsiveName="Title">{{ $book->title }}</x-table.table-data>
                    <x-table.table-data responsiveName="Author">{{ $book->author }}</x-table.table-data>
                    <x-table.table-data responsiveName="Amount Paid">{{ $book->publisher }}</x-table.table-data>
                    <x-table.table-data responsiveName="Balance Amount">{{ $book->year_published }}</x-table.table-data>
                    <x-table.table-data responsiveName="Date Paid">{{ $book->category->category_name }}</x-table.table-data>
                    <x-table.table-data responsiveName="Date Paid">{{ $book->isbn }}</x-table.table-data>
                    <x-table.table-data responsiveName="Date Paid">{{ $book->bookstatus->status }}</x-table.table-data>
                </x-table.table-row>
    
                @endforeach
            </x-table.tbody>
        </x-table.table>
    
        {{ $books->links() }}
        
    
        <div>
            <x-table.button wire:click="bookform" color="gray" class="py-2 px-4">Add Book</x-table.button>            
        </div>
    </div>   

    <div x-data="{ bookform:false }">
    
        <section x-on:bookform.window="bookform = true" x-on:closebookform.window="bookform = false"
            x-show.transition.duration.700ms="bookform" x-on:keydown.escape.window="bookform = false"
            class="absolute left-0 top-0 h-full z-10 bg-black bg-opacity-75 w-full py-1">
            <div x-on:click.away="bookform = false" class=" w-full lg:w-8/12 px-4 mx-auto mt-6">
                <div
                    class="bg-white  relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <h6 class="text-blueGray-700 text-xl font-bold">
                                Add Book
                            </h6>
                            <i x-on:click="bookform= false" class="fas fa-times text-2xl cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
    
    
                        <form wire:submit.prevent="addBook()">
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Book Details
                            </h6>
    
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlfor="grid-author">
                                            Author
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="author" placeholder="Enter Author's Name">
                                        @error('author')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlfor="grid-publisher">
                                            Publisher
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="publisher" placeholder="Enter Publisher's Name">
                                        @error('publisher')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlfor="grid-title">
                                            Title
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="title" placeholder="Enter Book Title">
                                        @error('title')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
    
    
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlfor="grid-password">
                                            Category
                                        </label>
    
                                        <select wire:model='category'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
    
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
    
                                        </select>
    
                                        @error('category')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlfor="grid-year">
                                            Year Published
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="year" placeholder="Enter Year Published">
                                        @error('year')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
    
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlfor="grid-isbn">
                                            ISBN
                                        </label>
                                        <input type="number"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="isbn" placeholder="Enter ISBN">
                                        @error('isbn')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                            htmlfor="grid-status">
                                            Status
                                        </label>
                                        <select wire:model='status'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="">Select Status</option>
                                            @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->status }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
    
                                <div class="ml-3 mt-3">
                                    <x-table.button color="gray" class="py-2 px-4">Add Book</x-table.button>
                                </div>
    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
    </div>

</div>
