<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 sm:py-16 lg:py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-xl mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">
                    Create Your Diet Plan
                </h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Fill in your details below to get a personalized nutrition plan
                </p>
            </div>

            <form action="{{ route('diet.plan.generate') }}" method="POST"
                class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 space-y-6 transition-all duration-200">
                @csrf

                <!-- Age Input -->
                <div class="space-y-2">
                    <label for="age" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Age
                    </label>
                    <input type="number" name="age" id="age" required
                        class="block w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white bg-white dark:bg-gray-900 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all duration-200"
                        value="{{ $data['age'] }}" placeholder="Enter your age">
                </div>

                <!-- Gender Select -->
                <div class="space-y-2">
                    <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Gender
                    </label>
                    <select name="gender" id="gender" required
                        class="block w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white bg-white dark:bg-gray-900 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all duration-200">
                        <option value="" disabled {{ empty($data['gender']) ? 'selected' : '' }}>Select your
                            gender</option>
                        <option value="male"
                            {{ isset($data['gender']) && $data['gender'] == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female"
                            {{ isset($data['gender']) && $data['gender'] == 'female' ? 'selected' : '' }}>Female
                        </option>
                    </select>

                </div>

                <!-- Height Input -->
                <div class="space-y-2">
                    <label for="height" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Height
                    </label>
                    <div class="relative">
                        <input type="number" name="height" id="height" required
                            class="block w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white bg-white dark:bg-gray-900 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all duration-200"
                            value="{{ $data['height'] }}" placeholder="Enter your height">
                        <span
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 text-sm">
                            cm
                        </span>
                    </div>
                </div>

                <!-- Weight Input -->
                <div class="space-y-2">
                    <label for="weight" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Weight
                    </label>
                    <div class="relative">
                        <input type="number" name="weight" id="weight" required
                            class="block w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white bg-white dark:bg-gray-900 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all duration-200"
                            value="{{ $data['weight'] }}" placeholder="Enter your weight">
                        <span
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 text-sm">
                            kg
                        </span>
                    </div>
                </div>

                <!-- Activity Level Select -->
                <div class="space-y-2">
                    <label for="activity_level" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Activity Level
                    </label>
                    <select name="activity_level" id="activity_level" required
                        class="block w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white bg-white dark:bg-gray-900 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all duration-200">
                        <option value="" disabled {{ empty($data['activity_level']) ? 'selected' : '' }}>Select
                            your activity level</option>
                        <option value="1"
                            {{ isset($data['activity_level']) && $data['activity_level'] == 1 ? 'selected' : '' }}>
                            Sedentary</option>
                        <option value="2"
                            {{ isset($data['activity_level']) && $data['activity_level'] == 2 ? 'selected' : '' }}>
                            Lightly Active</option>
                        <option value="3"
                            {{ isset($data['activity_level']) && $data['activity_level'] == 3 ? 'selected' : '' }}>
                            Moderately Active</option>
                        <option value="4"
                            {{ isset($data['activity_level']) && $data['activity_level'] == 4 ? 'selected' : '' }}>
                            Very Active</option>
                        <option value="5"
                            {{ isset($data['activity_level']) && $data['activity_level'] == 5 ? 'selected' : '' }}>
                            Super Active</option>
                    </select>

                </div>

                <!-- Goal Select -->
                <div class="space-y-2">
                    <label for="goal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Goal
                    </label>
                    <select name="goal" id="goal" required
                        class="block w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white bg-white dark:bg-gray-900 focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all duration-200">
                        <option value="" disabled selected>Select your goal</option>
                        <option value="weight_loss">Weight Loss</option>
                        <option value="weight_gain">Weight Gain</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 focus:outline-none">
                        Get Your Diet Plan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
