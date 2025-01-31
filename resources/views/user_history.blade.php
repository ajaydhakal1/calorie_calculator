<x-app-layout>
    <section
        class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 py-12 sm:py-20 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white tracking-tight px-4">
                    Your Calorie History
                </h2>
                <p class="mt-4 sm:mt-6 text-base sm:text-lg text-white/90 max-w-2xl mx-auto px-4">
                    Here are all the details of your previous calorie calculations
                </p>
            </div>

            <!-- History Table -->
            <div
                class="overflow-hidden bg-white/90 dark:bg-gray-900/90 rounded-2xl sm:rounded-3xl shadow-xl sm:shadow-2xl backdrop-blur-sm">
                @if ($userHistories->isEmpty())
                    <div class="flex flex-col items-center justify-center py-12 sm:py-16">
                        <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400">No history found</p>
                        <p class="mt-2 text-xs sm:text-sm text-gray-400 dark:text-gray-500">Start calculating to see your
                            history here</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <!-- Mobile View (Card Layout) -->
                        <div class="sm:hidden">
                            @foreach ($userHistories as $history)
                                <div class="p-4 border-b border-gray-200 dark:border-gray-800">
                                    <div class="flex justify-between items-start mb-3">
                                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $history->created_at->format('M d, Y') }}
                                        </span>
                                        <span
                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                            @switch($history->activity_level)
                                                @case(1)
                                                    bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200
                                                @break
                                                @case(2)
                                                    bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                                @break
                                                @case(3)
                                                    bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                @break
                                                @case(4)
                                                    bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                                @break
                                                @case(5)
                                                    bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200
                                                @break
                                                @default
                                                    bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200
                                            @endswitch
                                        ">
                                            @switch($history->activity_level)
                                                @case(1)
                                                    Sedentary
                                                @break

                                                @case(2)
                                                    Lightly Active
                                                @break

                                                @case(3)
                                                    Moderately Active
                                                @break

                                                @case(4)
                                                    Very Active
                                                @break

                                                @case(5)
                                                    Super Active
                                                @break

                                                @default
                                                    Unknown
                                            @endswitch
                                        </span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-700 dark:text-gray-300">
                                        <span>Height:</span>
                                        <span class="font-medium">{{ $history->height }} cm</span>
                                    </div>
                                    <div class="flex justify-between text-sm text-gray-700 dark:text-gray-300 mt-2">
                                        <span>Weight:</span>
                                        <span class="font-medium">{{ $history->weight }} kg</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Desktop View (Table Layout) -->
                        <table class="hidden sm:table min-w-full">
                            <thead>
                                <tr
                                    class="bg-gradient-to-r from-indigo-600 to-indigo-700 dark:from-indigo-800 dark:to-indigo-900">
                                    <th
                                        class="px-6 lg:px-8 py-4 text-left text-sm font-semibold text-white/90 tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-6 lg:px-8 py-4 text-left text-sm font-semibold text-white/90 tracking-wider">
                                        Height (cm)</th>
                                    <th
                                        class="px-6 lg:px-8 py-4 text-left text-sm font-semibold text-white/90 tracking-wider">
                                        Weight (kg)</th>
                                    <th
                                        class="px-6 lg:px-8 py-4 text-left text-sm font-semibold text-white/90 tracking-wider">
                                        Activity Level</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                                @foreach ($userHistories as $history)
                                    <tr
                                        class="hover:bg-indigo-50/50 dark:hover:bg-indigo-900/30 transition-colors duration-200">
                                        <td
                                            class="px-6 lg:px-8 py-5 text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $history->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 lg:px-8 py-5 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $history->height }} cm
                                        </td>
                                        <td class="px-6 lg:px-8 py-5 text-sm text-gray-700 dark:text-gray-300">
                                            {{ $history->weight }} kg
                                        </td>
                                        <td class="px-6 lg:px-8 py-5 text-sm">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                                @switch($history->activity_level)
                                                    @case(1)
                                                        bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200
                                                    @break
                                                    @case(2)
                                                        bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                                    @break
                                                    @case(3)
                                                        bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                    @break
                                                    @case(4)
                                                        bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                                    @break
                                                    @case(5)
                                                        bg-pink-100 text-pink-800 dark:bg-pink-900 dark:text-pink-200
                                                    @break
                                                    @default
                                                        bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200
                                                @endswitch
                                            ">
                                                @switch($history->activity_level)
                                                    @case(1)
                                                        Sedentary
                                                    @break

                                                    @case(2)
                                                        Lightly Active
                                                    @break

                                                    @case(3)
                                                        Moderately Active
                                                    @break

                                                    @case(4)
                                                        Very Active
                                                    @break

                                                    @case(5)
                                                        Super Active
                                                    @break

                                                    @default
                                                        Unknown
                                                @endswitch
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Back to Dashboard Button -->
            <div class="mt-8 sm:mt-16 text-center">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base font-medium text-white bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 rounded-full transition-all duration-200 transform hover:scale-105 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:from-indigo-700 dark:to-indigo-800 dark:hover:from-indigo-800 dark:hover:to-indigo-900">
                    ← Back to Home
                </a>
            </div>
        </div>
    </section>
</x-app-layout>