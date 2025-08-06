<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">{{ $event->title }}</h3>
                    
                    <div class="mb-4">
                        <strong class="font-semibold">Date:</strong>
                        <p class="text-gray-700">{{ \Carbon\Carbon::parse($event->date)->format('l, F jS, Y \a\t g:i A') }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="font-semibold">Location:</strong>
                        <p class="text-gray-700">{{ $event->location }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="font-semibold">Description:</strong>
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $event->description }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <strong class="font-semibold">Organized by:</strong>
                        {{-- We can access the organizer's name through the relationship we defined! --}}
                        <p class="text-gray-700">{{ $event->organizer->name }}</p>
                    </div>
                    
                    <hr class="my-6">
                    <div>
                        <h4 class="text-lg font-bold mb-4">Event Registration</h4>

                        @php
                            // Check if the authenticated user is registered for this event
                            $isRegistered = auth()->user()->registrations->contains($event);
                        @endphp

                        @if ($isRegistered)
                            {{-- If registered, show the Unregister button --}}
                            <p class="mb-4">You are registered for this event.</p>
                            <form action="{{ route('events.unregister', $event) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                                    Unregister
                                </button>
                            </form>
                        @else
                            {{-- If not registered, show the Register button --}}
                             <form action="{{ route('events.register', $event) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Register for this Event
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('events.index') }}" class="text-blue-500 hover:text-blue-700">
                            &larr; Back to All Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>