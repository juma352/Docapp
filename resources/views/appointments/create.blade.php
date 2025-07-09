<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Book Appointment</h2>
    <form method="POST" action="{{ route('appointments.store') }}" class="space-y-4">
        @csrf
        <input type="text" name="doctor_name" placeholder="Doctor's Name" class="w-full p-2 border rounded" required>
        <input type="datetime-local" name="appointment_time" class="w-full p-2 border rounded" required>
        <textarea name="notes" placeholder="Notes (optional)" class="w-full p-2 border rounded"></textarea>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Book</button>
    </form>
</x-app-layout>
