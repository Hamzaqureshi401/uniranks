<x-base-layout>
    <livewire:pages.campus-information-card/>
    <x-shared.general.main class="mb-5">
        {{--<livewire:pages.page-navigation/>--}} 
        <!-- <div class="row mt-3 mx-0 px-0"> -->
            <!-- Main Content -->
            <!-- <div class="col-12 col-lg-9-5 px-0"> -->
                 <main class="main-wrapper">
    <div class="main-content">
                {{ $slot }}
            </div>
        </main>
            {{--<!-- </div> -->
            <!-- end main content -->
            <!-- RIGHT SIDEBAR START -->
            <!-- <livewire:pages.components.sidebar.right-sidebar/> -->
            <!-- RIGHT SIDEBAR CLOSED -->
        <!-- </div> -->--}}
    </x-shared.general.main>
</x-base-layout>
