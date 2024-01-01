<div class="col-lg-12 col-sm-12">
    <div class="">
        <h5 class="h5 blue">@lang($title)
        @include('about-icon')</h5>
    </div>
    <div class="card">
        <div class="card-body" x-data="{start_date: @entangle('start_date'),end_date: @entangle('end_date'),curriculums: @entangle('curriculums').defer}"
             x-init="addPickerToElement($refs.start_date);
             addPickerToElement($refs.end_date);
             $watch('start_date', value => {
             if(value){end_date = value;
             addPickerToElement($refs.end_date,value)
             }
             })" >
            <x-jet-validation-errors class="mb-4 alert alert-danger"/>
            @if (session('status'))
                <div class="mb-4 font-medium alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="" wire:submit.prevent="">
                <div class="row">
                    <div class="col-lg-12 d-flex">
                        <label for="inputPassword2" class="red me-2">*</label>
                        <input class="form-control input-field" wire:model.lazy="title" placeholder="@lang("Name the fair (By default will be University Name Open Day)")">
                    </div>
                </div>
                @php
                /**
                * @var \App\Models\Fairs\FairType[] $all_fair_types
                * @var \App\Models\General\FeeRange [] $all_fee_ranges
                */
                @endphp
                <div class="row mt-3" wire:ignore wire:key="dates">

                    <div class="col-lg-6 mobile-marg-2 d-flex">
                        <label for="inputPassword2" class="red me-2">*</label>
                        <input type="text" x-model="start_date"  x-ref="start_date" class="form-control input-field datetime"
                               placeholder="@lang('Start Date and Time')">
                    </div>
                    <div class="col-lg-6 mobile-marg-2 d-flex" >
                        <label for="inputPassword2" class="red me-2">*</label>
                        <input type="text" x-model="end_date"  x-ref="end_date" class="form-control input-field datetime"
                               placeholder="@lang('End Date and Time')">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="h-100 d-flex">
                            <label for="inputPassword2" class="red me-2">*</label>
                            <input type="number" wire:model.lazy="max_students" class="form-control input-field"
                                   placeholder="@lang("Maximum number of attending students")">
                        </div>
                    </div>
                    <div class="col-lg-6 mobile-marg-2">
                        <div class="h-100 ms-3" wire:ignore wire:key="selected_curriculms">
                            <select id="select_curriculums"  x-model="curriculums" class="form-control input-field" width="100%" height="100%" name="states[]" multiple="multiple">
                                @foreach($all_curriculums as $curriculum)
                                    <option value="{{ $curriculum->id }}">{{ $curriculum->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="h-100 ms-3">
                            <select wire:model="fee_range" class="input-field form-control" aria-label="">
                                <option value="">@lang("Tuition Fee")</option>
                                @foreach($all_fee_ranges as $fee_range)
                                    <option value="{{ $fee_range->id }}">{{ $fee_range->currency_range }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="h-100 ms-3 light-blue">
                            <b>{{$no_schools}} @lang('Will be invited')</b>
                        </div>
                    </div>
                </div>
                <div class="row mt-3" style="padding-left: 17px">
                    <div class="col-12">
                        <textarea class="form-control input-textarea" placeholder="@lang("Description")" rows="3" wire:model="description"></textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12 px-5 text-center">
                        <hr class="w-100 mt-2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-3">
                            <button wire:click="save" class="button-dark-blue width-25 button-sm mobile-btn">@lang("Confirm and Create")</button>
                            <button wire:click="cancel" class="button-red width-25  button-sm  mobile-btn">@lang("Cancel")</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @php
        /** @var \App\Models\University\UniversityEvent $event*/
    @endphp
    @if(!empty($event))
        <div class="h4 blue mt-5">@lang('Edit Open Day History')</div>
        @foreach($event->history as $history)
            @php
                $details = $history->details;
            @endphp
            <div class="card bg-transparent mt-3">
                <div class="card-body">
                    <div class="w-100">
                        <div class="row mt-2">
                            <div class="paragraph-style2">@lang('Open Day') <span
                                    class="light-blue">@lang('on') </span>{{ $history->created_at }}</div>
                            <div class="light-blue paragraph-style2 mt-1">@lang('Name:') <span
                                    class="blue">{{$details['title'] ?? 'N/A'}}</span></div>
                            <div class="light-blue paragraph-style2">@lang('Fair type: ')<span
                                    class="blue">{{$details['fair_type'] ?? '---'}}</span></div>
                            <div class="light-blue paragraph-style2">@lang('Tuition Fee: ')<span
                                    class="blue"> {{ $details['fee_range']?? 'N/A'}}</span></div>
                            <div class="light-blue paragraph-style2">@lang('Start Date and Time: ')<span
                                    class="blue">{{ Helpers::dayDateTimeFormat($details['start_datetime']) ?? "N/A"}}</span>
                            </div>
                            <div class="light-blue paragraph-style2">@lang('End Date and Time: ')<span
                                    class="blue">{{ Helpers::dayDateTimeFormat($details['end_datetime']) ?? "N/A"}}</span>
                            </div>
                            <div class="light-blue paragraph-style2">@lang('Curriculums: ')<span
                                    class="blue">{{ $details['curriculums'] ?? "N/A" }}</span></div>
                            <div class="light-blue paragraph-style2">@lang('City: ')<span
                                    class="blue">{{ $details['city'] ?? "N/A"}}</span></div>
                            <div class="light-blue paragraph-style2">@lang('Description: ')<span
                                    class="blue">{{ $details['description'] ?? 'N/A'}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @endif
    @push(AppConst::PUSH_CSS)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush
    @push(AppConst::PUSH_JS)
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script type="text/javascript">
            function  addPickerToElement(el,min_date = "today"){
                return flatpickr(el,{
                    enableTime: true,
                    allowInput: true,
                    minDate: min_date,
                })
            }
        </script>

        <script>
            $(document).ready(function () {
                $("#select_curriculums").select2({
                    placeholder: "Select Curriculums",
                    sorter: addSelectAll,
                },@js($curriculums));
                $('#select_curriculums').on('change', function (e) {
                    var curriculum_data = $('#select_curriculums').select2("val");
                    @this.set('curriculums', curriculum_data);
                    @this.getSchoolsCount()
                });
            });
            const addSelectAll = matches => {
                if (matches.length > 0) {
                    return [
                        {id: 'selectAll', text: 'Select all matches', matchIds: matches.map(match => match.id)},
                        ...matches
                    ];
                }
            };
            const handleSelection = event => {
                if (event.params.data.id === 'selectAll') {
                    $('#select_curriculums').val(event.params.data.matchIds);
                    $('#select_curriculums').trigger('change');
                };
            };
            $('#select_curriculums').select2({
                minimumInputLength: 2,
                multiple: true,
                sorter: addSelectAll,
                width: '15rem',
            });
            $('#select_curriculums').on('select2:select', handleSelection);
        </script>
    @endpush
</div>
