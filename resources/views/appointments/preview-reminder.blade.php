<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Preview Appointment Reminder') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-3xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Preview Reminder Message</h3>

            @php
                $time = \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y h:i A');
            @endphp

            <div class="mb-4">
                <h4 class="font-semibold text-gray-900 dark:text-gray-100">Message to Patient</h4>
                <p class="mb-2 text-gray-900 dark:text-gray-100">Hello {{ $appointment->patient_name }},</p>
                <p class="mb-2 text-gray-900 dark:text-gray-100">
                    This is a reminder for your appointment with Dr. {{ $appointment->doctor_name }} on {{ $time }}.
                </p>
                <p class="mb-2 text-gray-900 dark:text-gray-100">Please arrive 10 minutes early.</p>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold text-gray-900 dark:text-gray-100">Message to Doctor</h4>
                <p class="mb-2 text-gray-900 dark:text-gray-100">Hello Dr. {{ $appointment->doctor_name }},</p>
                <p class="mb-2 text-gray-900 dark:text-gray-100">
                    You have an upcoming appointment with {{ $appointment->patient_name }} on {{ $time }}.
                </p>
                <p class="mb-2 text-gray-900 dark:text-gray-100">Please review the patient's notes prior to the meeting.</p>
            </div>

            <form method="POST" action="{{ route('appointments.sendReminder', $appointment->id) }}">
                @csrf
                <input type="hidden" name="channel" value="{{ $channel }}">
                <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Send Reminder
                </button>
                <a href="{{ route('appointments.index') }}" class="ml-4 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
