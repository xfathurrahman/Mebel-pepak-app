<x-app-layout>
    <x-slot name="header_content">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a><i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}</a></li>
            </ol>
        </nav>
    </x-slot>
    <div class="py-12 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
