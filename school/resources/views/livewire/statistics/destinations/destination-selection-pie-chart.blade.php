<div class="card">
    <div class="card-body">
        <div class="w-100">
            <div class="row">
                <div class="col-12 blue mb-3">
                    <p class="paragraph-style2 my-2">{{ __("Total Students") }}: {{ $total_school_students }}</p>
                    <p class="paragraph-style2 my-2 font-weight-bold">{{ $total_count }} {{ __("Students Have Selected Destination") }}</p>
                    <p class="paragraph-style2 my-2">{{ __("Remind students who didn't registered or complete their profiles to register and complete their profiles.") }}</p>
                    <button wire:click="sendEmail" class="button-sm button-dark-blue mx-0">{{ __("Send Reminder to Students Now!") }}</button>
                    <p class="paragraph-style2 mb-2">{{ __("an email will be sent to students who doesn't register or didn't complete their profiles to as a reminder to complete this stage.") }}</p>
                </div>
                <hr>
                <div class="col-12 mt-3" x-init="$nextTick(() => {
                    new Chart('pie-chart', {
                        type: 'pie',
                        data: {
                            labels: @js($chart_labels),
                            datasets: [{
                                label: '{{ __('Destination Selection Statistic Pie Chart') }}',
                                data: @js($chart_dataset),
                                backgroundColor: @js($chart_colors),
                                hoverOffset: 4
                            }],
                        },
                        options: { plugins: { legend: { position: 'top', align: 'start', display:true } } }
                    }) //end new chart function
                })" x-transition:enter.duration.500ms>
                    <canvas id="pie-chart" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
