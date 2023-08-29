<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{url('/')}}"><img alt="image" src="{{ asset('storage/assets/mp.png') }}" class="w-20 p-1 pt-3 pb-0 mx-auto mb-0"></a>
            <a href="{{url('/')}}" class="brandname">Mebel Pepak</a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="username" value="{{ __('Nama Pengguna') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-2">
                <x-jet-label for="name" value="{{ __('Nama Lengkap') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-2">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-2">
                <x-jet-label for="phone_number" value="{{ __('Nomor Handphone') }}" />
                <x-jet-input id="phone_number" class="block mt-1 w-full" type="number" name="phone_number" :value="old('phone_number')" required />
            </div>

            {{--Alamat Lengkap--}}
            <div class="mt-2">
                <x-jet-label for="address" value="{{ __('Alamat Lengkap') }}" />
                <textarea id="address" class="block mt-1 w-full h-20 tf-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="address" :value="old('address')" required></textarea>
            </div>

            <div class="mt-2">
                <x-jet-label for="password" value="{{ __('Kata Sandi') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-2">
                <x-jet-label for="password_confirmation" value="{{ __('Ulangi Kata Sandi') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('Saya setuju dengan :terms_of_service dan :privacy_policy.', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Sudah mendaftar?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Mendaftar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
