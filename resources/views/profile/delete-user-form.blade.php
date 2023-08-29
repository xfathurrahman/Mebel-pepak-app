<x-jet-action-section>
    <x-slot name="title">
        {{ __('Hapus akun') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Hapus akun kamu secara permanent.') }}
        <div x-show="! photoPreview">
            <img src="{{asset('storage/assets/delete.png')}}" style="display: inline-block; margin-left: auto; margin-right: auto;" class="w-52 h-40" alt="">
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="h-40">
            <div class="max-w-xl text-sm text-gray-600">
                {{ __('Sekali kamu hapus, semua data akan terhapus permanent. Sebelum menghapus akun, tolong cadangkan data yang mungkin kamu butuhkan.') }}
            </div>

            <div class="mt-5">
                <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                    {{ __('Hapus akun') }}
                </x-jet-danger-button>
            </div>

            <!-- Delete User Confirmation Modal -->
            <x-jet-dialog-modal wire:model="confirmingUserDeletion">
                <x-slot name="title">
                    {{ __('Hapus akun') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Kamu yakin ingin hapus akun ? Sekali hapus akun , semua data akan terhapus permanent! . Tolong masukan kata sandi untuk menghapus akun.') }}

                    <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                        <x-jet-input type="password" class="mt-1 block w-3/4"
                                    placeholder="{{ __('Kata sandi') }}"
                                    x-ref="password"
                                    wire:model.defer="password"
                                    wire:keydown.enter="deleteUser" />

                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                        {{ __('Batal') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                        {{ __('Hapus Akun') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
        </div>
    </x-slot>

</x-jet-action-section>
