<x-base-layout>
    <livewire:pages.campus-information-card/>
    <x-shared.general.main class="mb-5">
        <livewire:pages.page-navigation/>
        <!-- <div class="row mt-3 mx-0 px-0"> -->
            <!-- Left Sidebar start -->
            <livewire:pages.components.sidebar.stats-sidebar/>
            <!-- Left Sidebar End -->
            <!-- Main Content -->
            <!-- <div class="col-12 col-md-7 px-0"> -->
                 <main class="main-wrapper">
                    <div class="main-content">
                {{ $slot }}
            </div>
        </main>
            <!-- end main content -->
            <!-- RIGHT SIDEBAR START -->
            <livewire:pages.components.sidebar.right-sidebar/>
            <!-- RIGHT SIDEBAR CLOSED -->
        <!-- </div> -->
        @push(AppConst::PUSH_JS)
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
        @endpush
    </x-shared.general.main>
</x-base-layout>
