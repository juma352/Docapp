<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Appointments') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto px-4">
        @foreach ($appointments as $appointment)
            <div class="border-b border-gray-600 py-4">
                <div class="mb-2 text-gray-900 dark:text-gray-100">
                    <strong>Doctor:</strong> {{ $appointment->doctor_name }}<br>
                    <strong>Date & Time:</strong> {{ \Carbon\Carbon::parse($appointment->date_time)->format('M d, Y h:i A') }}<br>
                    <strong>Notes:</strong> {{ $appointment->notes ?? 'N/A' }}
                </div>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-2">
                    <!-- Reminder Form -->
                    <form method="GET" action="{{ route('appointments.previewReminder', $appointment->id) }}">
                        <div class="flex items-center gap-2">
                            <select name="channel" class="px-2 py-1 border rounded text-sm">
                                <option value="SMS">SMS</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Email">Email</option>
                            </select>
                            <button type="submit"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                                Preview Reminder
                            </button>
                        </div>
                    </form>

                    <!-- Edit Button -->
                    <a href="{{ route('appointments.edit', $appointment->id) }}"
                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                        Edit
                    </a>

                    <!-- Delete Form -->
                    <form method="POST" action="{{ route('appointments.destroy', $appointment->id) }}"
                          onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
