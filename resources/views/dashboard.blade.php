<x-app-layout>
<x-slot name="header">
    <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - User List') }}
        </h2>
<a href="{{ route('users.create') }}"
   class="inline-block px-4 py-2 bg-white text-gray-900 border border-gray-300 rounded hover:bg-gray-100 shadow transition duration-150">
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

<div class="w-full overflow-x-auto">
    <table class="w-full table-auto bg-white text-gray-900 dark:bg-gray-900 dark:text-white shadow rounded border border-gray-300 dark:border-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-800 text-sm uppercase text-gray-600 dark:text-gray-300">
            <tr>
                <th class="px-6 py-4 text-left whitespace-nowrap">Name</th>
                <th class="px-6 py-4 text-left whitespace-nowrap">Email</th>
                <th class="px-6 py-4 text-left whitespace-nowrap">Phone</th>
                <th class="px-6 py-4 text-left whitespace-nowrap">Bio</th>
                <th class="px-6 py-4 text-left whitespace-nowrap">Address</th>
                <th class="px-6 py-4 text-left whitespace-nowrap">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->profile->phone ?? 'N/A' }}</td>
                        <td class="px-6 py-4 truncate max-w-xs" title="{{ $user->profile->bio ?? 'N/A' }}">
                            {{ \Illuminate\Support\Str::limit($user->profile->bio ?? 'N/A', 40, '...') }}
                        </td>
                        <td class="px-6 py-4 truncate max-w-xs" title="{{ $user->profile->address ?? 'N/A' }}">
                            {{ \Illuminate\Support\Str::limit($user->profile->address ?? 'N/A', 40, '...') }}
                        </td>
                        <td class="px-6 py-4 space-x-2 whitespace-nowrap">
                            <a href="{{ route('users.edit', $user) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 dark:text-red-400 hover:underline">
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
