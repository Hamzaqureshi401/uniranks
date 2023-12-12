<x-base-layout>
    <livewire:school.school-info-card/>
    <x-shared.general.main class="mb-5">
        <livewire:school.page-navigation/>
        <div class="row mt-3 mx-0 px-0">
            <!-- Left Sidebar start -->
            <livewire:pages.components.sidebar.left-sidebar/>
            <!-- Left Sidebar End -->
            <!-- Main Content -->
            <div class="col-12 col-md-7  px-0">
{{--                <x-general.breadcrumb/>--}}
                {{ $slot }}
            </div>
            <!-- end main content -->
            <!-- RIGHT SIDEBAR START -->
            <livewire:pages.components.sidebar.right-sidebar/>
            <!-- RIGHT SIDEBAR CLOSED -->
        </div>
    </x-shared.general.main>
</x-base-layout>
