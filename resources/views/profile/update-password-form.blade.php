<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Ubah Kata Sandi') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Usahakan kata sandi kamu panjang dan sulit di tebak untuk keamanan akunmu yaa..') }}
    </x-slot>

    <x-slot name="form">
        <div class="text-left col-span-6 sm:col-span-2 pt-4 px-4">
            <x-jet-label for="current_password" value="{{ __('Masukan kata sandimu saat ini') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="text-left col-span-6 sm:col-span-2 py-4 px-4">
            <x-jet-label for="password" value="{{ __('Kata sandi baru') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="text-left col-span-6 sm:col-span-2 py-4 px-4">
            <x-jet-label for="password_confirmation" value="{{ __('Ulangi kata sandi baru') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Tersimpan.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
