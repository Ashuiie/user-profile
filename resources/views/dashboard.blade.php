<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - User List') }}
        </h2>
<a href="{{ route('users.create') }}"
   class="inline-block px-4 py-2 bg-white text-gray-900 border border-gray-400 rounded hover:bg-gray-100">
   Add New User
</a>
    </div>
</x-slot>

    <div class="py-10 max-w-6xl mx-auto px-4">
        @if (session('success'))
            <div class="mb-4 text-green-400 font-semibold">
                {{ session('success') }}
            </div>
        @endif

<div class="overflow-x-auto">
    <table class="w-full bg-white text-gray-800 dark:bg-gray-900 dark:text-white rounded shadow">
        <thead class="bg-gray-200 dark:bg-gray-800 border-b border-gray-300 dark:border-gray-700">
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Phone</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->profile->phone ?? 'N/A' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('users.edit', $user) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Edit</a>

                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')"
                                    class="text-red-600 dark:text-red-400 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
