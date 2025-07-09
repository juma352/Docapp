<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Appointment
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
            <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
                @csrf
                @method('PUT')

                <!-- Reuse your fields, pre-filled -->
                <div class="space-y-4">
                    <input type="text" name="patient_name" value="{{ old('patient_name', $appointment->patient_name) }}" required class="w-full p-2 border rounded">
                    <input type="text" name="patient_phone" value="{{ old('patient_phone', $appointment->patient_phone) }}" required class="w-full p-2 border rounded">
                    <input type="text" name="doctor_name" value="{{ old('doctor_name', $appointment->doctor_name) }}" required class="w-full p-2 border rounded">
                    
                    <select name="appointment_type" required class="w-full p-2 border rounded">
                        @foreach (['Follow-up', 'Check-up', 'Consultation', 'Treatment', 'Lab Results'] as $type)
                            <option value="{{ $type }}" {{ $appointment->appointment_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>

                    <input type="datetime-local" name="date_time" value="{{ old('date_time', \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d\TH:i')) }}" required class="w-full p-2 border rounded">

                    <select name="channel" required class="w-full p-2 border rounded">
                        <option value="SMS" {{ $appointment->channel === 'SMS' ? 'selected' : '' }}>SMS</option>
                        <option value="WhatsApp" {{ $appointment->channel === 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                        <option value="Other" {{ $appointment->channel === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <button type="submit" class="mt-6 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
