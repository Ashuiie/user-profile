<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-2xl mx-auto px-4">
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-input-label for="name" value="Name" />
                <x-text-input type="text" name="name" id="name" class="block w-full" :value="$user->name" required />
            </div>

            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input type="email" name="email" id="email" class="block w-full" :value="$user->email" required />
            </div>

            <div class="mb-4">
                <x-input-label for="bio" value="Bio" />
                <x-text-input type="text" name="bio" id="bio" class="block w-full" :value="$user->profile->bio ?? ''" />
            </div>

            <div class="mb-4">
                <x-input-label for="phone" value="Phone" />
                <x-text-input type="text" name="phone" id="phone" class="block w-full" :value="$user->profile->phone ?? ''" />
            </div>

            <div class="mb-4">
                <x-input-label for="address" value="Address" />
                <x-text-input type="text" name="address" id="address" class="block w-full" :value="$user->profile->address ?? ''" />
            </div>

            <x-primary-button>Update User</x-primary-button>
        </form>
    </div>
</x-app-layout>
