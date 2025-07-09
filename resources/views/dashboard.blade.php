<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Message -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Appointments Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Upcoming Appointments</h3>
                    @forelse ($appointments as $appointment)
                        <div class="border-b border-gray-600 py-2">
                            <strong>Doctor:</strong> {{ $appointment->doctor_name }}<br>
                            <strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('M d, Y h:i A') }}<br>
                            <strong>Notes:</strong> {{ $appointment->notes ?? 'N/A' }}
                        </div>
                    @empty
                        <p class="text-gray-400 mt-2">You have no upcoming appointments.</p>
                    @endforelse

                    <a href="{{ route('appointments.create') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        + Book New Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
