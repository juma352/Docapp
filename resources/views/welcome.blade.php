<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to the Appointment Management System') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Welcome!</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                This is a simple appointment management system where you can create, view, and manage your appointments easily.
            </p>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                Please <a href="{{ route('login') }}" class="text-green-600 hover:underline">log in</a> or <a href="{{ route('register') }}" class="text-green-600 hover:underline">register</a> to get started.
            </p>
            <p class="text-gray-700 dark:text-gray-300">
                Once logged in, you will be able to manage your appointments from the dashboard.
            </p>
        </div>
    </div>
</x-app-layout>
