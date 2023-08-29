<x-slot name="header_content">
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a><i class="fas fa-cog"></i> {{ __('Pengaturan') }}</a></li>
            <li class="breadcrumb-item"><a><i class="far fa-user-circle"></i> {{ __('Akun') }}</a></li>
        </ol>
    </div>
</x-slot>

<x-jet-form-section submit="updateProfileInformation" class="mt-12">

    <x-slot name="title">
        {{ __('Info Utama Akun') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Tempat kamu bisa ubah info akun !') }}
    </x-slot>

    <x-slot name="form">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <!-- Profile Photo -->
            <div  class="col-span-6 mt-4 sm:col-span-3 px-4" x-data="{photoName: null, photoPreview: null}">
                <x-jet-label class="-mt-6" for="name" value="{{ __('Ubah Foto Profile') }}"></x-jet-label>
                <div class="border-2 col-span-2 rounded-md" >
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                           wire:model="photo"
                           x-ref="photo"
                           x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                    " />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img style="margin-right: auto;
                                        margin-left: auto;
                                        display: inline-block;"
                             src="{{ $this->user->profile_photo_url }}"
                             alt="{{ $this->user->username }}"
                             class="rounded-full h-40 w-40 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 mr-auto ml-auto inline-block"
                         x-show="photoPreview">
                            <span class="block mr-auto ml-auto rounded-full w-40 h-40"
                                  x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                            </span>
                    </div>

                    <x-jet-secondary-button class="my-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Pilih Foto') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2 bg-danger text-white" wire:click="deleteProfilePhoto">
                            {{ __('Hapus') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2"></x-jet-input-error>
                </div>

                <div class="text-left col-span-6 sm:col-span-3 mt-4 px-0" >
                    <!-- Username -->
                    <div class="mb-2">
                        <x-jet-label for="username" value="{{ __('Nama Pengguna') }}"></x-jet-label>
                        <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" autocomplete="username" />
                        <x-jet-input-error for="username" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-2">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="state.email" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>

                </div>

            </div>
        @endif

            <div class="text-left col-span-6 sm:col-span-3 px-4" >

                <!-- Nama Lengkap -->
                <div class="mb-2">
                    <x-jet-label for="name" value="{{ __('Nama Lengkap') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-2">
                    <x-jet-label for="gender_id" value="{{ __('Jenis Kelamin') }}" />
                    <select id="gender_id" wire:model.defer="state.gender_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="2">Pilih Jenis Kelamin</option>
                        <option value="1">Laki - Laki</option>
                        <option value="0">Perempuan</option>
                    </select>
                    <x-jet-input-error for="gender_id" class="mt-2" />
                </div>

                <!-- Telephone Number -->
                <div class="my-2">
                    <x-jet-label for="phone_number" value="{{ __('Nomor Handphone') }}" />
                    <x-jet-input id="phone_number" type="number" class="mt-1 block w-full" wire:model.defer="state.phone_number" />
                    <x-jet-input-error for="phone_number" class="mt-2" />
                </div>

                <!-- Tanggal Lahir -->
                <div class="my-2">
                    <x-jet-label for="birth_date" value="{{ __('Tanggal Lahir') }}" />
                    <x-jet-input id="birth_date" type="date" class="mt-1 block w-full" wire:model.defer="state.birth_date" />
                    <x-jet-input-error for="birth_date" class="mt-2" />
                </div>

                <!-- Alamat -->
                <div class="my-2">
                    <x-jet-label for="address" value="{{ __('Alamat') }}" />
                    <textarea type="longtext" id="address" class="mt-1 block w-full h-20 tf-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.address" rows="5" name="address" id="form.reason" ></textarea>
                    <x-jet-input-error for="address" class="mt-2" />
                </div>
            </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Tersimpan.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
