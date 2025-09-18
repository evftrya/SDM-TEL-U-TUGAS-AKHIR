@extends('admin.layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold">Edit User</h1>
                        <p class="text-gray-600 mt-2">Update information for {{ $user->name }}</p>
                    </div>
                    <a href="{{ route('admin.users.show', $user) }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        ← Back to User
                    </a>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $user->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', $user->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Admin Role -->
                    <div>
                        <div class="flex items-center">
                            <input id="is_admin" type="checkbox" name="is_admin" value="1"
                                {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                @if ($user->is_admin && App\Models\User::where('is_admin', true)->count() <= 1) disabled @endif>
                            <label for="is_admin" class="ml-2 text-sm text-gray-700">
                                Administrator privileges
                            </label>
                        </div>
                        @if ($user->is_admin && App\Models\User::where('is_admin', true)->count() <= 1)
                            <p class="text-sm text-red-600 mt-1">Cannot remove admin privileges from the last administrator.
                            </p>
                            <input type="hidden" name="is_admin" value="1">
                        @endif
                        <x-input-error :messages="$errors->get('is_admin')" class="mt-2" />
                    </div>

                    <!-- Current Status Info -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-900 mb-2">Current User Information</h3>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <dt class="font-medium text-gray-700">User ID:</dt>
                                <dd class="text-gray-600">#{{ $user->id }}</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-700">Account Created:</dt>
                                <dd class="text-gray-600">{{ $user->created_at->format('M d, Y') }}</dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-700">Email Verified:</dt>
                                <dd class="text-gray-600">
                                    @if ($user->email_verified_at)
                                        <span class="text-green-600">✓ Verified</span>
                                    @else
                                        <span class="text-red-600">✗ Unverified</span>
                                    @endif
                                </dd>
                            </div>
                            <div>
                                <dt class="font-medium text-gray-700">Last Updated:</dt>
                                <dd class="text-gray-600">{{ $user->updated_at->format('M d, Y') }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('admin.users.show', $user) }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:border-gray-500 focus:ring ring-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <x-primary-button>
                            {{ __('Update User') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Warning Section -->
        @if ($user->is_admin && App\Models\User::where('is_admin', true)->count() <= 1)
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex">
                    <svg class="w-5 h-5 text-yellow-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h3 class="text-sm font-medium text-yellow-800">Warning</h3>
                        <p class="text-sm text-yellow-700 mt-1">
                            This is the last administrator account in the system. Admin privileges cannot be removed to
                            ensure system access is maintained.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
