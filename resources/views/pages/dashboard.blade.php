<x-right-sidebar-layout>
    <div class="mt-3 mb-3">
        <h2 class="h2 blue">@lang("WORLD'S LARGEST SCHOOLS EVENT PLATFORM")</h2>
        <p class="paragraph-style1 gray font-normal mt-3">@lang("School Master is highest school student support platform
            that helps counselors and students to be in direct contact with student's dream university. That
            platform allows schools to arrange multiple university activities like university fairs,
            career talks, workshops, open-houses, competitions, internship opportunities, and more.")</p>
    </div>
{{--    <livewire:dashboard.navigation-cards/>--}}
    <livewire:dashboard.other-website-links/>
{{--    <livewire:dashboard.statistics-cards/>--}}
{{--    <livewire:dashboard.latest-events/>--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Refresh the page every 10 seconds (10000 milliseconds)
            console.log(1);
            setInterval(function() {
                location.reload();
            }, 50000);
        });
    </script>
</x-right-sidebar-layout>
