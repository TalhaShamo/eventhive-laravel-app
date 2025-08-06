<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EventHive - Your Hub for Upcoming Events</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-100 dark:bg-gray-900">
        <div class="relative min-h-screen">
            <!-- Header Section -->
            <header class="absolute top-0 right-0 p-6 z-10">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </header>

            <!-- Main Content -->
            <main class="py-24">
                <div class="max-w-7xl mx-auto px-6 lg:px-8">
                    <!-- Hero Section -->
                    <div class="text-center mb-16">
                        <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-800 dark:text-white">
                            Welcome to EventHive
                        </h1>
                        <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                            Discover and join the best events happening near you.
                        </p>
                    </div>

                    <!-- Events Grid -->
                    <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-6">Upcoming Events</h2>
                    @if($events->isEmpty())
                        <div class="text-center py-16">
                             <p class="text-gray-500 dark:text-gray-400">There are no upcoming events at the moment. Check back soon!</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($events as $event)
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $event->title }}</h3>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            {{ \Carbon\Carbon::parse($event->date)->format('D, M j, Y') }} &bull; {{ $event->location }}
                                        </p>
                                        <p class="mt-4 text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                                            {{ Str::limit($event->description, 120) }}
                                        </p>
                                        <div class="mt-6">
                                            <a href="{{ route('login') }}" class="font-semibold text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300">
                                                Log in to see details &rarr;
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </main>

            <!-- Footer -->
            <footer class="py-6 text-center text-sm text-gray-500 dark:text-gray-400 mt-auto">
                EventHive &copy; {{ date('Y') }}
            </footer>
        </div>
    </body>
</html>
