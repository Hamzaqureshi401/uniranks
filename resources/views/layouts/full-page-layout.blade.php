<x-base-layout>
    <livewire:pages.campus-information-card/>
    <x-shared.general.main class="mb-5">
        <livewire:pages.page-navigation/>
        <div class="row mt-3 mx-0 px-0">
            <!-- Main Content -->
            <div class="col-12 px-0">
                {{ $slot }}
            </div>
            <!-- end main content -->
        </div>
    </x-shared.general.main>
</x-base-layout>
