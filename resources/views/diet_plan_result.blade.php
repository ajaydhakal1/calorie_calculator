<x-app-layout>
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 transition-colors duration-200">
        <div class="max-w-2xl w-full mx-4 my-6">
            <div
                class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 transform hover:scale-[1.01] transition-all duration-300 border border-gray-100 dark:border-gray-700">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="h-10 w-1 bg-indigo-600 dark:bg-indigo-500 rounded-full"></div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">
                        Your Personalized Diet Plan
                    </h2>
                </div>

                <div class="prose prose-gray dark:prose-invert max-w-none">
                    <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                        {{ $dietPlan }}
                    </p>
                </div>

                <div class="mt-8 flex justify-start">
                    <a href="{{route("diet.plan")}}"
                        class="group relative inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 dark:bg-indigo-500 text-white rounded-xl hover:bg-indigo-700 dark:hover:bg-indigo-600 transition-all duration-200 shadow-md hover:shadow-lg">
                        <span class="relative">Generate Another Plan</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
