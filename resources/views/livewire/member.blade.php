<div>
    <div class="mt-20 ">
        <div class="text-gray-700 font-bold text-3xl mt-8 mb-4">
            <h1>Books</h1>
        </div>

        <x-table.table>
            <x-table.thead>

                <x-table.table-head>First Name</x-table.table-head>
                <x-table.table-head>Last Name</x-table.table-head>
                <x-table.table-head>Email</x-table.table-head>
                <x-table.table-head>Address</x-table.table-head>
                <x-table.table-head>City</x-table.table-head>
                <x-table.table-head>Parish</x-table.table-head>
            </x-table.thead>
            <x-table.tbody>
                @foreach ($members as $member)
                <x-table.table-row>
                    <x-table.table-data responsiveName="Title">{{ $member->first_name }}</x-table.table-data>
                    <x-table.table-data responsiveName="Author">{{ $member->last_name }}</x-table.table-data>
                    <x-table.table-data responsiveName="Amount Paid">{{ $member->email }}</x-table.table-data>
                    <x-table.table-data responsiveName="Balance Amount">{{ $member->address }}</x-table.table-data>
                    <x-table.table-data responsiveName="Date Paid">{{ $member->parish }}</x-table.table-data>
                    <x-table.table-data responsiveName="Date Paid">{{ $member->city }}</x-table.table-data>
                </x-table.table-row>

                @endforeach
            </x-table.tbody>
        </x-table.table>

        {{ $members->links() }}


        <div>
            <x-table.button wire:click="memberform" color="gray" class="py-2 px-4">Add Member</x-table.button>
        </div>
    </div>

    <div x-data="{ memberform:false }">

        <section x-on:memberform.window="memberform = true" x-on:closememberform.window="memberform = false"
            x-show.transition.duration.700ms="memberform" x-on:keydown.escape.window="memberform = false"
            class="absolute left-0 top-0 h-full z-10 bg-black bg-opacity-75 w-full py-1">
            <div x-on:click.away="memberform = false" class=" w-full lg:w-8/12 px-4 mx-auto mt-6">
                <div
                    class="bg-white  relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                    <div class="rounded-t bg-white mb-0 px-6 py-6">
                        <div class="text-center flex justify-between">
                            <h6 class="text-blueGray-700 text-xl font-bold">
                                Add Member
                            </h6>
                            <i x-on:click="memberform= false" class="fas fa-times text-2xl cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">


                        <form wire:submit.prevent="addmember()">
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Member Details
                            </h6>

                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            First Name
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="fname" placeholder="Enter First Name">
                                        @error('fname')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Last Name
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="lname" placeholder="Enter Last Name">
                                        @error('lname')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Email
                                        </label>
                                        <input type="email"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="email" placeholder="Enter Email">
                                        @error('email')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Address
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="address" placeholder="Enter Street Address">
                                        @error('address')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            City
                                        </label>
                                        <input type="text"
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            wire:model="city" placeholder="Enter City">
                                        @error('city')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="w-full lg:w-6/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                            Parish
                                        </label>
                                        <select wire:model='parish'
                                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                            <option value="">Select Parish</option>
                                            <option value="Clarendon">Clarendon</option>
                                            <option value="Hanover">Hanover</option>
                                            <option value="Kingston & St Andrew">Kingston & St Andrew</option>
                                            <option value="Manchester">Manchester</option>
                                            <option value="St. Ann">St. Ann</option>
                                            <option value="St. Catherine">St. Catherine</option>
                                            <option value="St. Elizabeth">St. Elizabeth</option>
                                            <option value="St. James">St. James</option>
                                            <option value="St. Mary">St. Mary</option>
                                            <option value="St. Thomas">St. Thomas</option>
                                            <option value="Trelawny">Trelawny</option>
                                            <option value="Westmoreland">Westmoreland</option>

                                        </select>
                                        @error('status')<span class="text-xs text-red-600">{{
                                            $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="ml-3 mt-3">
                                    <x-table.button color="gray" class="py-2 px-4">Add Member</x-table.button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>