<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    </x-slot>
    <div class="px-6 pt-6 2xl:container">
        <!-- add user button -->
        <div class="">
            <button @click="showModal1 = true"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Add Principal
            </button>
        </div>

        <!-- Card -->
        <div class="mt-5">
            <div class="block p-6 rounded-lg shadow-lg bg-white">
                <table id="principals" class="">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surcon Number</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($principals as $principal)
                            <tr>
                                <td>{{ $principal->name }}</td>
                                <td>{{ $principal->surcon_number }}</td>
                                <td>{{ $principal->status->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="fixed inset-0 w-full h-full z-20 bg-black bg-opacity-50 duration-300 overflow-y-auto" x-show="showModal1"
        x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="sm:w-3/4 md:w-1/2 lg:w-1/3 mx-2 sm:mx-auto h-full my-10 opacity-100">
            <div class="bg-white shadow-lg rounded-md text-gray-900 z-20" @click.away="showModal1 = false"
                x-show="showModal1" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100"
                x-transition:leave-end="scale-0">
                <header class="flex items-center justify-between p-2">
                    <h2 class="font-bold mx-6">Add Principal</h2>
                    <button class="focus:outline-none p-2" @click="showModal1 = false">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </button>
                </header>
                <main class="mx-8">
                    <form action="{{ route('principals.store') }}" method="POST" class="pb-5">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="name" class="form-label inline-block mb-2 text-gray-700">Name</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal
                                text-gray-700 bg-white bg-clip-padding border border-solid
                                border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700
                                focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="name" name="name" value="{{ old('name') }}" placeholder="Enter name">
                            @error('name')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Surcon Number" class="form-label inline-block mb-2 text-gray-700">Surcon
                                Number</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="Surcon Number" name="surcon_number" placeholder="Enter Surcon Number"
                                value="{{ old('surcon_number') }}">
                            @error('surcon_number')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Status" class="form-label inline-block mb-2 text-gray-700">Status</label>
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="status" name="status_id">
                                <option selected>Select Status</option>
                                @foreach (App\Models\Status::all() as $status)
                                    <option value="{{ $status->id }}"
                                        @if (old('status_id') == $status->id) selected @endif>{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit"
                            class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
    <x-slot name=scripts>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#principals').DataTable();
            });
        </script>
    </x-slot>
</x-app-layout>
