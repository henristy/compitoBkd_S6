<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-5">

                        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800 ">Welcome to Gymnasties, your go-to place for all things Gymnastics. Discover, learn, and connect with fellow Gymnasts, book sessions, and participate in tournaments. </h1>
                        <hr class="my-5">
                        <span class="flex justify-center"><a href="#activities" class="btn btn-info "> Explore Activities </a></span>
                    </div>

                   

                    <div class="mt-5" id="activities">
                        <h1>Activities</h1>
                        <hr>
                        <div class="container">
                            <div class="row">
                                
                                @foreach ($activities as $activity)
                                    <div class="col-md-4 g-2">
                                        <div class="card  bg-base-100 shadow-xl">
                                            <img class="card-img-top" src="{{ $activity->image }}" alt="gym activity" />
                                            <div class="card-img-overlay h-25">
                                                <span class="text-white "><i class="bi bi-clock mr-2 "></i> {{ $activity->duration_minutes }} min </span>
                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-title text-center">{{ $activity->name }}</h2>
                                                <p class="card-text">{{ $activity->description }}</p>
                                                <p class="card-text">{{ $activity->benefits}}></p>

                                                <div class="d-flex justify-content-end mt-3">
                                                    <a href="{{ route('bookings.create', ['activity' => $activity]) }}" class="btn btn-primary"> Book Now!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>