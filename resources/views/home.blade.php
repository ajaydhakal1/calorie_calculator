<x-app-layout>
    <section
        class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 py-16 dark:bg-gradient-to-br dark:from-indigo-700 dark:via-purple-700 dark:to-pink-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="text-white lg:pr-8 dark:text-gray-100">
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight tracking-tight">
                        Calculate Your Daily
                        <span class="block mt-2">Calorie Needs</span>
                    </h2>
                    <p class="mt-6 text-lg sm:text-xl text-white/90 leading-relaxed dark:text-gray-300">
                        Get personalized calorie, fat, and protein recommendations based on your profile and activity
                        level.
                    </p>
                </div>

                <!-- Calculator Form -->
                <div class="w-full max-w-xl mx-auto lg:mx-0" style="margin-top: -50px;">
                    @guest
                        <h2 class="text-center text-xl text-white dark:text-gray-200">Please Login to save your progress.
                        </h2>
                    @endguest
                    <form method="POST" action="{{ route('calculate') }}" class="space-y-8">
                        @csrf
                        <div
                            class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl p-6 sm:p-8 space-y-6 dark:bg-gray-800 dark:bg-opacity-80">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Enter Your Details</h3>

                            <!-- Age Input -->
                            <div class="space-y-2">
                                <label for="age"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Age
                                    (years)</label>
                                <input type="number" name="age" id="age" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors duration-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500"
                                    placeholder="Enter your age">
                            </div>

                            <!-- Gender Select -->
                            <div class="space-y-2">
                                <label for="gender"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                                <select name="gender" id="gender" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors duration-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <!-- Height Input -->
                            <div class="space-y-2">
                                <label for="height"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Height
                                    (cm)</label>
                                <input type="number" name="height" id="height" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors duration-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500"
                                    placeholder="Enter your height">
                            </div>

                            <!-- Weight Input -->
                            <div class="space-y-2">
                                <label for="weight"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Weight
                                    (kg)</label>
                                <input type="number" name="weight" id="weight" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors duration-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500"
                                    placeholder="Enter your weight">
                            </div>

                            <!-- Activity Level Select -->
                            <div class="space-y-2">
                                <label for="activity_level"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Activity
                                    Level</label>
                                <select name="activity_level" id="activity_level" required
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-colors duration-200 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500">
                                    <option value="1">Sedentary (little to no exercise)</option>
                                    <option value="2">Lightly Active (1-3 days/week)</option>
                                    <option value="3">Moderately Active (3-5 days/week)</option>
                                    <option value="4">Very Active (6-7 days/week)</option>
                                    <option value="5">Super Active (physical job or 2x training)</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 hover:scale-105 dark:bg-indigo-700 dark:hover:bg-indigo-800">
                                Calculate My Needs
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
