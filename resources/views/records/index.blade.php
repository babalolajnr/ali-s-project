<x-app-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    </x-slot>
    <div class="px-6 pt-6 2xl:container">
        <!-- add user button -->
        <div class="">
            <button @click="showModal1 = true"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Add record
            </button>
        </div>

        <!-- Card -->
        <div class="mt-5">
            <div class="block p-6 rounded-lg shadow-lg bg-white">
                <table id="records" class="">
                    <thead>
                        <tr>
                            <th>Principal Name</th>
                            <th>Status</th>
                            <th>Quarter</th>
                            <th>Number of pillars</th>
                            <th>Amount</th>
                            <th>SURCON</th>
                            <th>NAT NIS</th>
                            <th>SSCE</th>
                            <th>STNIS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->principal_name }}</td>
                                <td>{{ $record->status }}</td>
                                <td>{{ $record->quarter }}</td>
                                <td>{{ $record->no_of_pillars }}</td>
                                <td>{{ $record->amount }}</td>
                                <td>{{ $record->surcon }}</td>
                                <td>{{ $record->nat_nis }}</td>
                                <td>{{ $record->ssce }}</td>
                                <td>{{ $record->stnis }}</td>
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
                    <h2 class="font-bold mx-6">Add record</h2>
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
                    <form action="{{ route('records.store') }}" method="POST" class="pb-5">
                        @csrf
                        <div class="form-group mb-6">
                            <label for="principal" class="form-label inline-block mb-2 text-gray-700">Principal</label>
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="principal" name="principal_id">
                                <option selected>Select Principal</option>
                                @foreach (App\Models\Principal::all() as $principal)
                                    <option value="{{ $principal->id }}"
                                        @if (old('principal_id') == $principal->id) selected @endif>{{ $principal->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('principal_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Start" class="form-label inline-block mb-2 text-gray-700">Start</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="Start" name="start" placeholder="Enter Start" value="{{ old('start') }}">
                            @error('start')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="To" class="form-label inline-block mb-2 text-gray-700">To</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="To" name="to" placeholder="Enter To" value="{{ old('to') }}">
                            @error('to')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Number of Pillars" class="form-label inline-block mb-2 text-gray-700">Number of
                                Pillars</label>
                            <input type="number"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="no-of-pillars" name="no_of_pillars" placeholder="Enter Number of Pillars"
                                value="{{ old('no_of_pillars') }}">
                            @error('no_of_pillars')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Plan Number" class="form-label inline-block mb-2 text-gray-700">Plan
                                Number</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="plan-number" name="plan_no" placeholder="Enter Plan Number"
                                value="{{ old('plan_no') }}">
                            @error('plan_no')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Location" class="form-label inline-block mb-2 text-gray-700">Location</label>
                            <input type="text"
                                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="location" name="location" placeholder="Enter Location"
                                value="{{ old('location') }}">
                            @error('location')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="lga" class="form-label inline-block mb-2 text-gray-700">LGA</label>
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="lga" name="lga_id">
                                <option selected>Select lga</option>
                                @foreach ($lgas as $lga)
                                    <option value="{{ $lga->id }}"
                                        @if (old('lga_id') == $lga->id) selected @endif>{{ $lga->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Unit Price" class="form-label inline-block mb-2 text-gray-700">Unit
                                Price</label>
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="unitPrice" name="unit_price_id">
                                <option selected>Select Unit Price</option>
                                @foreach (\App\Models\UnitPrice::all() as $unitPrice)
                                    <option value="{{ $unitPrice->id }}"
                                        @if (old('unit_price_id') == $unitPrice->id) selected @endif>{{ $unitPrice->price }}
                                    </option>
                                @endforeach
                            </select>
                            @error('unit_price_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Payment Mode" class="form-label inline-block mb-2 text-gray-700">Payment
                                Mode</label>
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="paymentMode" name="payment_mode_id">
                                <option selected>Select payment mode</option>
                                @foreach (\App\Models\PaymentMode::all() as $paymentMode)
                                    <option value="{{ $paymentMode->id }}"
                                        @if (old('payment_mode_id') == $paymentMode->id) selected @endif>{{ $paymentMode->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_mode_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Quarter" class="form-label inline-block mb-2 text-gray-700">Quarter</label>
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="quarter" name="quarter_id">
                                <option selected>Select quarter</option>
                                @foreach (\App\Models\Quarter::all() as $quarter)
                                    <option value="{{ $quarter->id }}"
                                        @if (old('quarter_id') == $quarter->id) selected @endif>{{ $quarter->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('quarter_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-6">
                            <label for="Type" class="form-label inline-block mb-2 text-gray-700">Type</label>
                            <select
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label="type" name="type_id">
                                <option selected>Select type</option>
                                @foreach (\App\Models\Type::all() as $type)
                                    <option value="{{ $type->id }}"
                                        @if (old('type_id') == $type->id) selected @endif>{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
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
                $('#records').DataTable();
            });
        </script>
    </x-slot>
</x-app-layout>
