<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Registrations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Events You Are Registered For</h3>
                    
                    @forelse ($registrations as $event)
                        <div class="border-b border-gray-200 py-4 flex justify-between items-center">
                            <div>
                                <h4 class="text-xl font-bold">{{ $event->title }}</h4>
                                <p class="text-sm text-gray-600"><strong>Location:</strong> {{ $event->location }}</p>
                                <p class="text-sm text-gray-600"><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('D, M j, Y g:i A') }}</p>
                            </div>
                            <div>
                                <a href="{{ route('events.show', $event) }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">You have not registered for any events yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
