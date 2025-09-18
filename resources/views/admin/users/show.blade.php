@extends('admin.layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold">User Details</h1>
                        <p class="text-gray-600 mt-2">View detailed information for {{ $user->name }}</p>
                    </div>
                    <div class="space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit User
                        </a>
                        <a href="{{ route('admin.users') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            ← Back to Users
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Information -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">User Information</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Basic Information</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-900">User ID</dt>
                                <dd class="text-sm text-gray-600">#{{ $user->id }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-900">Full Name</dt>
                                <dd class="text-sm text-gray-600">{{ $user->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-900">Email Address</dt>
                                <dd class="text-sm text-gray-600">{{ $user->email }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-900">Role</dt>
                                <dd class="text-sm">
                                    @if ($user->is_admin)
                                        <span
                                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Administrator
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                            Regular User
                                        </span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Account Status</h3>
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-900">Email Verification</dt>
                                <dd class="text-sm">
                                    @if ($user->email_verified_at)
                                        <span
                                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Verified
                                        </span>
                                        <div class="text-xs text-gray-500 mt-1">
                                            Verified on {{ $user->email_verified_at->format('M d, Y \a\t g:i A') }}
                                        </div>
                                    @else
                                        <span
                                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                            Unverified
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-900">Account Created</dt>
                                <dd class="text-sm text-gray-600">{{ $user->created_at->format('M d, Y \a\t g:i A') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-900">Last Updated</dt>
                                <dd class="text-sm text-gray-600">{{ $user->updated_at->format('M d, Y \a\t g:i A') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-900">Account Age</dt>
                                <dd class="text-sm text-gray-600">{{ $user->created_at->diffForHumans() }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Actions</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.users.edit', $user) }}"
                        class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition duration-150 ease-in-out">
                        <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-blue-900">Edit User</h3>
                            <p class="text-xs text-blue-700">Modify user information</p>
                        </div>
                    </a>

                    @if (!$user->is_admin || ($user->is_admin && App\Models\User::where('is_admin', true)->count() > 1))
                        <form method="POST" action="{{ route('admin.users.delete', $user) }}"
                            onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');"
                            class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition duration-150 ease-in-out w-full text-left">
                                <svg class="w-8 h-8 text-red-600 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                <div>
                                    <h3 class="text-sm font-medium text-red-900">Delete User</h3>
                                    <p class="text-xs text-red-700">Permanently remove user</p>
                                </div>
                            </button>
                        </form>
                    @else
                        <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                            <svg class="w-8 h-8 text-gray-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Protected Account</h3>
                                <p class="text-xs text-gray-400">Cannot delete last admin</p>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('admin.users') }}"
                        class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150 ease-in-out">
                        <svg class="w-8 h-8 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                            </path>
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">All Users</h3>
                            <p class="text-xs text-gray-700">Back to user list</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
