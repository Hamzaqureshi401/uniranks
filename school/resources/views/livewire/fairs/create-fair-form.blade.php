<div>
    <div class="row">
        <div class="col-12">
            <div class="h4 blue">@lang($title)</div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body" x-data="{start_date: @entangle('start_date'),end_date: @entangle('end_date')}"
                     x-init="addPickerToElement($refs.start_date);
                     addPickerToElement($refs.end_date,start_date);
                     $watch('start_date', value => {
                     if(value){end_date = value;
                     addPickerToElement($refs.end_date,value)
                     }
                     })">
                    <div class="w-100">
                        <x-jet-validation-errors class="mb-4 alert alert-danger"/>
                        <x-general.status-alert/>
                        {{--                        <form class="" wire:submit.prevent="">--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" wire:model.lazy="fair_name" class="form-control input-field"
                                       placeholder="@lang('Name the fair (By default will be school name fair)')">
                            </div>
                            <div class="col-lg-6 mobile-marg-2" wire:ignore wire:key="start_date">
                                <input type="text" x-model="start_date" x-ref="start_date"
                                       class="form-control input-field "
                                       placeholder="@lang('Start Date and Time')">
                            </div>
                        </div>
                        @php
                            /**
                            * @var \Illuminate\Database\Eloquent\Collection<\App\Models\Fairs\FairType>$fair_types
                            * @var \App\Models\Institutes\School $school
                            */
                        @endphp
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <select wire:model="type" class="h-100 form-control input-field" aria-label="">
                                    <option value="">@lang('Fair Type')</option>
                                    @foreach($fair_types as $fair_type)
                                        <option value="{{$fair_type->id}}">{{$fair_type->fair_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mobile-marg-2" wire:ignore wire:key="end_date">
                                <input type="text" x-model="end_date" x-ref="end_date" class="form-control input-field"
                                       placeholder="@lang('End Date and Time')">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <input type="number" wire:model.lazy="max" class="form-control input-field"
                                       placeholder="@lang('Maximum number of attending university')" min="0">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <hr>
                                <div class="h4 blue mb-3">@lang('Review and Confirm')</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Fair Name'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{!empty($fair_name)?$fair_name : $school->school_name}}"
                                       disabled=""
                                       readonly="" class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Fair Date and Time'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text"
                                       value="{{\Helpers::dayDateTimeFormat($start_date)}} - {{Helpers::dayDateTimeFormat($end_date)}}"
                                       disabled="" readonly="" class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Location'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->address1}}" disabled="" readonly=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Universities can attend this fair')
                                    : </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$max}}" disabled="" readonly=""
                                       class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Fair Type'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$fair_types?->where('id',$type)->value('fair_type_name')}}"
                                       disabled="" readonly="" class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Number of Grade 12 Students'):</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->number_grade12}}" disabled=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Number of Grade 11 Students'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->number_grade11}}" disabled="" readonly=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Grade 12 Fee'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->g_12_fee_range?->currency_range}}" disabled=""
                                       readonly=""
                                       class="form-control form-control-sm txt2"
                                       aria-label="My Fair">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('School Curriculum'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->curriculum?->title}}" disabled="" readonly=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <label class="blue align-center mt-1">@lang('Map Location'): </label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" value="{{$school->map_link}}" disabled="" readonly=""
                                       class="form-control form-control-sm txt2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <button wire:click="save" class="button-dark-blue button-sm mobile-btn  w-100"
                                        wire:loading.attr="disabled">@lang('Save')
                                </button>
                            </div>
                            <div class="col-3">
                                <button wire:click="save({{true}})" class="button-light-blue w-100 button-sm mobile-btn"
                                        wire:loading.attr="disabled">@lang('Save & Close')</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="button-red button-sm mobile-btn w-100"
                                        wire:loading.attr="disabled"
                                        wire:click="resetForm">@lang('Cancel')</button>
                            </div>
                            <div class="col-3">
                                <button type="button" @click="window.location='{{route('admin.school.fair.list')}}'"
                                        class="button-red  button-sm mobile-btn w-100"
                                        wire:loading.attr="disabled">@lang('Close')</button>
                            </div>
                        </div>
                        {{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
        <x-general.loading wire:target="save" message="Saving Data" />
    </div>
    @push(AppConst::PUSH_CSS)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.css">
    @endpush
    @push(AppConst::PUSH_JS)
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/confirmDate/confirmDate.js"></script>
        <script>
            function addPickerToElement(el, min_date = "today") {
                return flatpickr(el, {
                    locale: "{{app()->getLocale()}}",
                    enableTime: true,
                    allowInput: true,
                    minDate: min_date,
                    plugins: [new confirmDatePlugin({})],
                    confirmIcon: ' <i class="fa-solid fa-circle-check"></i>', // your icon's html, if you wish to override
                    confirmText: "OK",
                    showAlways: false,
                });
            }
        </script>
    @endpush
</div>
