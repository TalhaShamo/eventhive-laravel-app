<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('events.update', $event) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Important: Tells Laravel this is an UPDATE request --}}

                        <div class="mb-4">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}">
                            @error('title')<p class="text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="5">{{ old('description', $event->description) }}</textarea>
                            @error('description')<p class="text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="date">Date</label>
                            <input type="datetime-local" name="date" id="date" value="{{ old('date', $event->date) }}">
                            @error('date')<p class="text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}">
                            @error('location')<p class="text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit">Update Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>