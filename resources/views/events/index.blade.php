<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Display a success message if one is flashed to the session --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 dark:bg-green-900 dark:border-green-700 dark:text-green-200 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Upcoming Events</h3>
                    </div>
                    
                    {{-- Loop through the events and display them --}}
                    @forelse ($events as $event)
                        <div class="border-b border-gray-200 py-4 flex justify-between items-center">
                            {{-- This is the existing div for the event text --}}
                            <div>
                                <h4 class="text-xl font-bold">{{ $event->title }}</h4>
                                <p class="text-sm text-gray-600"><strong>Location:</strong> {{ $event->location }}</p>
                                <p class="text-sm text-gray-600"><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('D, M j, Y g:i A') }}</p>
                            </div>
        
                            <div class="flex space-x-4">
                                {{-- VIEW DETAILS LINK--}}
                                <a href="{{ route('events.show', $event) }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                                    View Details
                                </a>
                                
                                {{-- Only show Edit and Delete if the logged-in user is the event's organizer --}}
                                @if ($event->user_id === auth()->id())
                                    <a href="{{ route('events.edit', $event) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold">
                                        Edit
                                    </a>

                                <form action="{{ route('events.destroy', $event) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                </form>
                                @endif
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No events found. Why not create one?</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>