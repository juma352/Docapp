<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6 max-w-3xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-6 flex items-center gap-2">
                <span class="text-green-500 text-xl">➕</span> Add New Appointment
            </h2>
            <form method="POST" action="{{ route('appointments.store') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="patient_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Patient Name</label>
                    <input type="text" id="patient_name" name="patient_name" required 
                           placeholder="Enter patient's full name" value="{{ old('patient_name') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                    @error('patient_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="patient_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Patient Phone</label>
                    <input type="tel" id="patient_phone" name="patient_phone" required 
                           placeholder="Enter patient's phone number" value="{{ old('patient_phone') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                    @error('patient_phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="doctor_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Doctor Name</label>
                    <input type="text" id="doctor_name" name="doctor_name" required 
                           placeholder="Enter doctor's name" value="{{ old('doctor_name') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                    @error('doctor_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="appointment_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Appointment Type</label>
                    <select id="appointment_type" name="appointment_type" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                        <option value="">Select appointment type</option>
                        <option value="Follow-up" {{ old('appointment_type') == 'Follow-up' ? 'selected' : '' }}>Follow-up</option>
                        <option value="Check-up" {{ old('appointment_type') == 'Check-up' ? 'selected' : '' }}>Check-up</option>
                        <option value="Consultation" {{ old('appointment_type') == 'Consultation' ? 'selected' : '' }}>Consultation</option>
                        <option value="Treatment" {{ old('appointment_type') == 'Treatment' ? 'selected' : '' }}>Treatment</option>
                        <option value="Lab Results" {{ old('appointment_type') == 'Lab Results' ? 'selected' : '' }}>Lab Results</option>
                    </select>
                    @error('appointment_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="appointmentDateTime" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Appointment Date & Time</label>
                    <input type="datetime-local" id="appointmentDateTime" name="date_time" required 
                           value="{{ old('date_time') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                    @error('date_time')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="channel" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reminder Channel</label>
                    <select id="channel" name="channel" required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-green-500 focus:ring focus:ring-green-300 focus:ring-opacity-50">
                        <option value="">Select reminder channel</option>
                        <option value="SMS" {{ old('channel') == 'SMS' ? 'selected' : '' }}>SMS</option>
                        <option value="WhatsApp" {{ old('channel') == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                        <option value="Other" {{ old('channel') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('channel')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <button type="submit" class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    Add Appointment
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
