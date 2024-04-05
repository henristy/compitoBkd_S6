<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(count($bookings) > 0)
                    <h2 class="mt-6 h2 text-success">Confirmed Bookings - {{ count($bookings->where('status', 'confirmed')) }}</h2>
                    @foreach ($bookings->where('status', 'confirmed') as $booking) 
                    <div class="bg-gradient rounded-5 border-t-4 px-4 py-3 shadow-md my-3">
                                <div class="flex items-center justify-between">
                                    <img class="w-16 h-16" src="{{ $booking->activity->image }}"/>
                                    <div>
                                        <p>{{ $booking->activity->name }}</p>
                                        <h4>{{ date_create($booking->availableTime->date)->format('D, jS F') . ' at ' . $booking->availableTime->start_time}}</h4>
                                    </div>
                                    <div>
                                        <p>{{ $booking->user->name }}</p>
                                        <p>{{ $booking->user->email }}</p>
                                    </div>
                                    <form action="{{ route('bookings.update', $booking) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        @if (date_create($booking->availableTime->date)->format('Y-m-d +1') < date('Y-m-d'))
                                            <button disabled type="submit"  class="btn btn-outline-danger">Reject</button>
                                        @else
                                            <button type="submit"  class="btn btn-outline-danger">Reject</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        
                    @endforeach
                    <h2 class="mt-6 h2 text-warning">Bookings awaiting confirmation - {{ count($bookings->where('status', 'pending')) }}</h2>
                    @foreach ($bookings->where('status', 'pending') as $booking)
                        
                            <div class="bg-gradient rounded-5 border-t-4 px-4 py-3 shadow-md my-3">
                                <div class="flex items-center justify-between">
                                    <img class="w-16 h-16" src="{{ $booking->activity->image }}"/>
                                    <div>
                                        <p>{{ $booking->activity->name }}</p>
                                        <h4>{{ date_create($booking->availableTime->date)->format('D, jS F') . ' at ' . $booking->availableTime->start_time}}</h4>
                                    </div>
                                    <div>
                                        <p>{{ $booking->user->name }}</p>
                                        <p>{{ $booking->user->email }}</p>
                                    </div>
                                    <div>
                                        <form action="{{ route('bookings.update', $booking) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="confirmed">
                                            @if (date_create($booking->availableTime->date)->format('Y-m-d +1') < date('Y-m-d'))
                                                <button disabled type="submit"  class="btn btn-secondary">Accept</button>
                                            @else
                                                <button type="submit"  class="btn btn-outline-dark">Accept</button>
                                            @endif
                                        </form>
                                        <form action="{{ route('bookings.update', $booking) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejected">
                                            @if (date_create($booking->availableTime->date)->format('Y-m-d +1') < date('Y-m-d'))
                                                <button disabled type="submit"  class="btn btn-secondary">Reject</button>
                                            @else
                                                <button type="submit"  class="btn btn-outline-danger">Reject</button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                    
                    @endforeach
                    <h2 class="mt-6 h2 text-secondary">Rejected Bookings - {{ count($bookings->where('status', 'rejected')) }}</h2>
                    @foreach ($bookings->where('status', 'rejected') as $booking)
                            <div class="bg-gradient rounded-5 border-t-4 px-4 py-3 shadow-md my-3">
                                <div class="flex items-center justify-between">
                                    <img class="w-16 h-16" src="{{ $booking->activity->image }}"/>
                                    <div>
                                        <p>{{ $booking->activity->name }}</p>
                                        <h4>{{ date_create($booking->availableTime->date)->format('D, jS F') . ' at ' . $booking->availableTime->start_time}}</h4>
                                    </div>
                                    <div>
                                        <p>{{ $booking->user->name }}</p>
                                        <p>{{ $booking->user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        
                    @endforeach
                    @else
                        <p>no bookings have been made</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>