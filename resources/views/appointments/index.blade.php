<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Appointments') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">
                Upcoming & Past Appointments
            </h3>

            @forelse ($appointments as $appointment)
                <div class="border-b border-gray-600 py-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p><span class="font-semibold">Patient:</span> {{ $appointment->patient_name }}</p>
                            <p><span class="font-semibold">Doctor:</span> {{ $appointment->doctor_name }}</p>
                            <p><span class="font-semibold">Type:</span> {{ $appointment->appointment_type }}</p>
                            <p><span class="font-semibold">Time:</span>
                                {{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y h:i A') }}</p>
                        </div>
                        <span class="text-sm px-2 py-1 rounded-full
                            {{ $appointment->date_time < now() ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }}">
                            {{ $appointment->date_time < now() ? 'Completed' : 'Upcoming' }}
                        </span>
                    </div>
                </div>
            @empty
                <p class="text-gray-400 mt-4">No appointments found.</p>
            @endforelse

            <a href="{{ route('appointments.create') }}"
                class="inline-block mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Book New Appointment
            </a>
        </div>
    </div>
</x-app-layout>
