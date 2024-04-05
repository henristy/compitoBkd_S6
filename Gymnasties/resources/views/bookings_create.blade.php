
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reserve a Slot') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-6 flex flex-col justify-start items-center">
        <h1 class="text-3xl font-bold mb-4">{{ $activity->name }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
            <div class="bg-white rounded-lg shadow-md p-6 h-25">
                <img src="{{ asset($activity->image) }}" alt="{{ $activity->name }}" class="rounded-md mb-4 h-50">
                <p class="text-gray-700">{{ $activity->description }}</p>
                <p class="text-gray-700 mt-2">Benefits: {{ $activity->benefits }}</p>
                <p class="text-gray-700 mt-2">Duration: {{ $activity->duration_minutes }} minutes</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-start items-start h-50">
                <h2 class="text-2xl font-bold mb-4">Available Times</h2>
                <div class="border border-gray-200 p-4 rounded-md h-75">
                    <p class="text-gray-700 mb-2">Select a date and time:</p>
                    <div class="flex flex-wrap overflow-y-auto h-100">
                       
                        @foreach($availableTimesByDate as $date => $times)
                            <div class="w-full md:w-1/2 lg:w-1/3 p-2">
                                <div class="border border-gray-200 rounded-md p-2 cursor-pointer">
                                    <p class="text-gray-700 font-semibold mb-2">{{ date_create($date)->format('D, jS F') }}</p>
                                    <div class="flex gap-2 flex-wrap">
                                        @foreach($times as $time)
                                            <form action="{{ route('bookings.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />

                                                <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                                                <x-input-error :messages="$errors->get('activity_id')" class="mt-2" />

                                                <input type="hidden" name="available_time_id" value="{{ $time->id }}">
                                                <x-input-error :messages="$errors->get('available_time_id')" class="mt-2" />
                                                
                                                <input type="hidden" name="status" value="pending">
                                                <x-input-error :messages="$errors->get('status')" class="mt-2" />

                                                <button type="submit" class="btn btn-outline-success" > {{ $time->start_time }}</button>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    
                   
                    
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

