<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Preview Reminder') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-6 bg-white dark:bg-gray-800 shadow rounded-lg">
        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Reminder Preview</h3>
        <p class="mb-6 text-gray-700 dark:text-gray-300">{{ $message }}</p>

        <form method="POST" action="{{ route('appointments.sendReminder', $appointment->id) }}">
            @csrf
            <input type="hidden" name="channel" value="{{ $channel }}">
            <div class="flex gap-4">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Send Reminder
                </button>
                <a href="{{ url()->previous() }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
