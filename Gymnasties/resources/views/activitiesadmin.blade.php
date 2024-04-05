<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h1 class="text-3xl">
                                <span class="font-bold uppercase">Activities</span>
                            </h1>
                        </div>
                        <div class="flex gap-4">
                            <a href="{{ route('activities.create') }}" class="btn btn-primary">New Activity</a>
                        </div>
                    </div>

                    @if ($activities->count())
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">image</th>
                                            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Benefits</th>
                                            <th scope="col" class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                                            <th scope="col" class="relative px-6 py-3"></th>
                                        </tr>
                                        @if (session('addActivity'))
                                            <tr>
                                                <form action="{{ route('activities.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                                    @csrf
                                                    <td >
                                                        <input type="url" name="image" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"/>
                                                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                                                    </td>
                                                    <td><x-text-input name="name" /></td>
                                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                                    <td><textarea rows="3" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" ></textarea></td>
                                                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                                    <td><textarea rows="3" name="benefits" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" ></textarea></td>
                                                    <x-input-error class="mt-2" :messages="$errors->get('benefits')" />
                                                    <td><input type="number" name="duration_minutes" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"/></td>
                                                    <x-input-error class="mt-2" :messages="$errors->get('duration_minutes')" />
                                                    <td>
                                                        <x-primary-button>Add</x-primary-button>
                                                    </td>

                                                </form>
                                            </tr>
                                        @endif
                                        
                                        @foreach ($activities as $activity)
                                            <tr>
                                                @if(session('editActivityId') == $activity->id)
                                                    <form action="{{ route('activities.update', $activity) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                                        @csrf
                                                        @method('PATCH')
                                                        <td>
                                                            <x-text-input name="image" value="{{ $activity->image }}" />
                                                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                                                            <img src="{{ $activity->image }}" alt="activity_image" style="display: {{ $errors->has('image') ? 'block' : 'none' }}" width="50">
                                                        </td>
                                                        <td><x-text-input name="name" value="{{ $activity->name }}" /></td>
                                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                                        <td><textarea rows="3" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >{{ $activity->description }}</textarea></td>
                                                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                                        <td><textarea rows="3" name="benefits" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >{{ $activity->benefits }}</textarea></td>
                                                        <x-input-error class="mt-2" :messages="$errors->get('benefits')" />
                                                        <td><input type="number" name="duration_minutes" value="{{ $activity->duration_minutes }}" /></td>
                                                        <x-input-error class="mt-2" :messages="$errors->get('duration_minutes')" />
                                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <x-primary-button>Save</x-primary-button>
                                                        </td>
                                                    </form>
                                                @else
                                                    <td class="whitespace-nowrap text-sm text-gray-500">
                                                        <img src="{{ $activity->image }}" alt="activity_image" width="50">
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity->name }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity->description }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity->benefits }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity->duration_minutes }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('activities.edit', $activity) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                        <form action="{{ route('activities.destroy', $activity) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                    @endif
            </div>
        </div>  
    </div>
</x-app-layout>
