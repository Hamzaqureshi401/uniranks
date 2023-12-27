<x-base-layout>
    <livewire:pages.campus-information-card/>
    <x-shared.general.main class="mb-5">
       {{--<livewire:pages.page-navigation/>--}} 
        <!-- <div class="row mt-3 mx-0 px-0"> -->
              
            <!-- Left Sidebar start -->
            <livewire:pages.components.sidebar.left-sidebar/> 
            <!-- Left Sidebar End -->
            <!-- Main Content -->
            <!-- <div class="col-12 col-md-9  px-0"> -->
                <main class="main-wrapper">
    <div class="main-content">
                {{ $slot }}
            <!-- </div> -->
            <!-- end main content -->
            <!-- RIGHT SIDEBAR START -->
            <!-- RIGHT SIDEBAR CLOSED -->
        </div>
    </main>
    </x-shared.general.main>
</x-base-layout>
