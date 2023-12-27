<x-base-layout>
    <livewire:pages.campus-information-card/>
    <x-shared.general.main class="mb-5">
        {{--<livewire:pages.page-navigation/>--}} 
        <!-- <div class="row mt-3 mx-0 px-0"> -->
            <!-- Main Content -->
            <!-- <div class="col-12 px-0"> -->
                <main class="main-wrapper">
                    <div class="main-content">
                {{ $slot }}
                </div>
                </main>

                <script type="text/javascript">
                    $('.container').removeClass('container');
                </script>
            
            <!-- end main content -->
        <!-- </div> -->
    </x-shared.general.main>
</x-base-layout>
