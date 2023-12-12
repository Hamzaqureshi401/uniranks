<x-right-sidebar-layout>
{{--    <x-general.breadcrumb/>--}}
    <div class="mt-3 mb-3">
        <h2 class="h2 blue">@lang("WORLD'S LARGEST SCHOOLS EVENT PLATFORM") <i class="fa-solid fa-sm fa-circle-info light-blue" role="button" data-bs-toggle="modal" data-bs-target="#about-modal"></i></h2>
        <!-- Modal -->
        <div class="modal fade" id="about-modal" tabindex="-1" aria-labelledby="about-modal-label" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
{{--                        <h5 class="modal-title" id="about-modal-lable">@lang('About')</h5>--}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body paragraph-style1 blue font-normal">
                        {!! __("<b>School Master</b> powered by <b>UNIRANKS</b>is a cutting-edge student support platform that facilitates direct communication between counselors, students, and their desired universities. This premier platform empowers schools to seamlessly organize a wide range of university activities, including university fairs, career talks, workshops, open houses, competitions, internship opportunities, and various other valuable engagements. By leveraging School Master, schools can enhance their ability to connect students with their dream universities, fostering meaningful interactions and creating pathways to academic and career success.") !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
    <livewire:dashboard.navigation-cards/>
{{--    <livewire:dashboard.other-website-links/>--}}
    <livewire:dashboard.statistics-cards/>
    <livewire:dashboard.latest-events/>
</x-right-sidebar-layout>
