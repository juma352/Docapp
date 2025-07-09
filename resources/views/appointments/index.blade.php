<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Your Appointments</h2>
    @foreach ($appointments as $appointment)
        <div class="border p-4 mb-3">
            <strong>Doctor:</strong> {{ $appointment->doctor_name }}<br>
            <strong>Time:</strong> {{ $appointment->appointment_time }}<br>
            <strong>Notes:</strong> {{ $appointment->notes ?? 'N/A' }}
        </div>
    @endforeach
</x-app-layout>
