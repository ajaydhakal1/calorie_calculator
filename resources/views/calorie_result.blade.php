<x-app-layout>
    <section class="min-h-screen py-16 sm:py-24 bg-gradient-to-br from-blue-600 via-indigo-500 to-violet-500">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">Your Nutrition Blueprint</h2>
                <p class="text-xl text-white/90">Personalized recommendations based on your profile</p>
            </div>

            <!-- Main Metrics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <!-- TDEE Card -->
                <div
                    class="md:col-span-4 bg-white/95 backdrop-blur-sm rounded-3xl shadow-xl p-8 transform transition-all duration-300 hover:scale-102">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3">Daily Calorie Target (TDEE)</h3>
                    <div class="flex items-baseline">
                        <span class="text-6xl font-bold text-blue-600">{{ number_format($tdee) }}</span>
                        <span class="ml-2 text-2xl text-gray-500">kcal</span>
                    </div>
                </div>

                <!-- Macronutrient Cards -->
                <div
                    class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-xl p-6 transform transition-all duration-300 hover:scale-102">
                    <div class="flex flex-col h-full">
                        <h3 class="text-lg font-medium text-gray-700">Protein</h3>
                        <div class="mt-4 flex items-baseline">
                            <span class="text-4xl font-bold text-indigo-600">{{ number_format($protein, 1) }}</span>
                            <span class="ml-2 text-xl text-gray-500">g</span>
                        </div>
                        <p class="mt-3 text-sm text-gray-600">Muscle & Recovery</p>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-xl p-6 transform transition-all duration-300 hover:scale-102">
                    <div class="flex flex-col h-full">
                        <h3 class="text-lg font-medium text-gray-700">Fats</h3>
                        <div class="mt-4 flex items-baseline">
                            <span class="text-4xl font-bold text-violet-600">{{ number_format($fat, 1) }}</span>
                            <span class="ml-2 text-xl text-gray-500">g</span>
                        </div>
                        <p class="mt-3 text-sm text-gray-600">Hormones & Health</p>
                    </div>
                </div>

                <div
                    class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-xl p-6 transform transition-all duration-300 hover:scale-102">
                    <div class="flex flex-col h-full">
                        <h3 class="text-lg font-medium text-gray-700">Carbs</h3>
                        <div class="mt-4 flex items-baseline">
                            <span class="text-4xl font-bold text-purple-600">{{ number_format($carbs, 1) }}</span>
                            <span class="ml-2 text-xl text-gray-500">g</span>
                        </div>
                        <p class="mt-3 text-sm text-gray-600">Energy & Performance</p>
                    </div>
                </div>
            </div>

            <!-- Weight Management Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Weight Loss Card -->
                <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-red-100 rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 ml-4">Weight Loss Targets</h3>
                    </div>
                    <div class="space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <p class="text-gray-600 mb-2">Gentle Approach</p>
                            <p class="text-3xl font-bold text-red-600">{{ number_format($minimalDeficit) }} <span
                                    class="text-xl font-normal text-gray-500">kcal</span></p>
                        </div>
                        <div class="border-b border-gray-100 pb-4">
                            <p class="text-gray-600 mb-2">Balanced Approach</p>
                            <p class="text-3xl font-bold text-red-600">{{ number_format($balancedDeficit) }} <span
                                    class="text-xl font-normal text-gray-500">kcal</span></p>
                        </div>
                        <div>
                            <p class="text-gray-600 mb-2">Aggressive Approach</p>
                            <p class="text-3xl font-bold text-red-600">{{ number_format($extremeDeficit) }} <span
                                    class="text-xl font-normal text-gray-500">kcal</span></p>
                        </div>
                    </div>
                </div>

                <!-- Weight Gain Card -->
                <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-xl p-8">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-green-100 rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 15l7-7 7 7" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 ml-4">Weight Gain Targets</h3>
                    </div>
                    <div class="space-y-6">
                        <div class="border-b border-gray-100 pb-4">
                            <p class="text-gray-600 mb-2">Gentle Approach</p>
                            <p class="text-3xl font-bold text-green-600">{{ number_format($minimalSurplus) }} <span
                                    class="text-xl font-normal text-gray-500">kcal</span></p>
                        </div>
                        <div class="border-b border-gray-100 pb-4">
                            <p class="text-gray-600 mb-2">Balanced Approach</p>
                            <p class="text-3xl font-bold text-green-600">{{ number_format($balancedSurplus) }} <span
                                    class="text-xl font-normal text-gray-500">kcal</span></p>
                        </div>
                        <div>
                            <p class="text-gray-600 mb-2">Aggressive Approach</p>
                            <p class="text-3xl font-bold text-green-600">{{ number_format($extremeSurplus) }} <span
                                    class="text-xl font-normal text-gray-500">kcal</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-12 text-center">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center px-8 py-4 text-lg font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transform transition-all duration-200 hover:scale-105 shadow-lg hover:shadow-xl">
                    Calculate Again
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
