<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add New User
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto px-4">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="mb-4">
                <x-input-label for="name" value="Name" />
                <x-text-input name="name" id="name" type="text" class="block w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input name="email" id="email" type="email" class="block w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="password" value="Password" />
                <x-text-input name="password" id="password" type="password" class="block w-full" required />
            </div>

            <div class="mb-4">
                <x-input-label for="password_confirmation" value="Confirm Password" />
                <x-text-input name="password_confirmation" id="password_confirmation" type="password" class="block w-full" required />
            </div>

            <x-primary-button>Add User</x-primary-button>
        </form>
    </div>
</x-app-layout>
