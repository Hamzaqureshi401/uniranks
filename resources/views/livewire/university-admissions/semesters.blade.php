<div>
    <x-general.university-admissions-page-title sub-title="Semesters"/>
    <div class="paragraph-style-2 blue  mb-3">
        @lang('University Admission Semesters with Admission deadline')
    </div>
    <div class="card mt-1">
        <div class="card-body">
            <div class="blue">@lang('Add a new Semester')</div>
            <div  x-data="{information: @entangle('information')}"
                  x-init="addPickerToElement($refs.start_date);addPickerToElement($refs.end_date);
                     $watch('information.start_date', value => {
                     if(value){end_date = value;
                     addPickerToElement($refs.end_date,value)
                     }
                     })">
                <x-general.status-alert/>
                <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
                @for($i = 0; $i<$details_in_langs; $i++)
                    <div class="row mt-3">
                        <div @class(["mobile-marg-2 col-md-8","col-md-12"=>($i == 0)])>
                            <div class="form-floating w-100">
                                <input wire:model.defer="names.{{$i}}" class="form-control input-field"
                                       placeholder="@lang('Name')">
                                <label for="floatingInput">@lang('Name')</label>
                            </div>
                        </div>
                        @if($i > 0)
                            <div class="col-md-4">
                                <div class="form-floating w-100">
                                    <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">@lang('Select Language') </label>
                                </div>

                            </div>
                        @endif
                    </div>

                    <div class="w-100 px-5 mt-4">
                        <hr>
                    </div>
                @endfor
                <div class=" text-place-end mt-4 mb-4">
                    <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage" type="button">
                        @lang('+ Add Information into different language')
                    </button>
                </div>
                @php
                    /**
                    * @var \App\Models\University\Admissions\UniversitySemester $information
                    **/
                @endphp
                <div class="row mt-3"  wire:ignore wire:key="dates">
                    <div class="col-md-6">
                        <div class="form-floating w-100">
                            <input x-model="information.start_date" x-ref="start_date" class="form-control input-field date"
                                   placeholder="@lang('Start Date')">
                            <label for="floatingInput">@lang('Start Date')</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating w-100">
                            <input x-model="information.end_date" x-ref="end_date"
                                   class="form-control input-field date"
                                   placeholder="@lang('End Date')">
                            <label for="floatingInput">@lang('End Date')</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-6 d-flex justify-content-md-end">
            <button wire:click="save" class="button-blue button-sm mobile-button w-35">@lang('Save')</button>
            <button wire:click="initForm" class="button-red button-sm mobile-button w-35">@lang('Cancel')</button>
        </div>
    </div>
    @php
        /**
        * @var \App\Models\University\Admissions\UniversitySemester[] $dataCollection
        **/
    @endphp
    <div class="card bg-transparent mt-4">
    <div class="card-body">
        <div class="h4 blue">@lang('Semesters')</div>
         <div class="w-100 px-4 mt-3">
            <hr>
        </div>
        @foreach($dataCollection ??[] as $dataItem)
            <div class="d-md-flex h6 blue justify-content-between mt-3">
                <div class="col-md-4">{{$dataItem->name}}</div>
                <div class="">{{$dataItem->start_date}}</div>
                <div class="">{{$dataItem->end_date}}</div>
                <div class="z-index-100">
                    <a href="" class="light-blue" wire:click.prevent="edit('{{$dataItem->id}}')" class="blue">@lang('Edit')</a>
                </div>
                <div class=""><a href="" wire:click.prevent="delete('{{$dataItem->id}}')" class="red">@lang('Delete')</a></div>
            </div>
        @endforeach
    </div>
</div>

<x-jet-modal wire:model="isModalOpen">
   <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
   <x-slot name="title">
      @lang('Update Semester Record')
   </x-slot>
@for($i = 0; $i<$edit_details_in_langs; $i++)
                    <div class="row mt-3">
                        <div @class(["mobile-marg-2 col-md-8","col-md-12"=>($i == 0)])>
                            <div class="form-floating w-100">
                                <input wire:model.defer="names.{{$i}}" class="form-control input-field"
                                       placeholder="@lang('Name')">
                                <label for="floatingInput">@lang('Name')</label>
                            </div>
                        </div>
                        @if($i > 0)
                            <div class="col-md-4">
                                <div class="form-floating w-100">
                                    <select wire:model.defer="translations.{{$i}}" class="form-select input-field">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">@lang('Select Language') </label>
                                </div>

                            </div>
                        @endif
                    </div>

                    <div class="w-100 px-5 mt-4">
                        <hr>
                    </div>
                @endfor
                <div class=" text-place-end mt-4 mb-4">
                    <button class="m-0 button-no-bg" wire:click="addEditDetailsInOtherLanguage" type="button">
                        @lang('+ Add Information into different language')
                    </button>
                </div>
                @php
                    /**
                    * @var \App\Models\University\Admissions\UniversitySemester $information
                    **/
                @endphp
                <div class="row mt-3"  wire:ignore wire:key="dates">
                    <div class="col-md-6">
                        <div class="form-floating w-100"> 
                            
                            <input type="date" wire:model.defer="edit.start_date" class="form-control input-field dat"
               placeholder="@lang('Start Date')">
                            <label for="floatingInput">@lang('Start Date')</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating w-100">
                             <input type="date" wire:model.defer="edit.end_date" class="form-control input-field dat"
               placeholder="@lang('End Date')">
                            <label for="floatingInput">@lang('End Date')</label>
                        </div>
                    </div>
                </div>
</x-jet-modal>
    <x-general.loading wire:target="addDetailsInOtherLanguage, save, initForm, delete, edit" message="Processing..."/>

@push(AppConst::PUSH_CSS)
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
         <style type="text/css">
            .flatpickr-calendar{
                top : 393.271px !important;
            }
        </style>
    @endpush
    @push(AppConst::PUSH_JS)
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @if(app()->getLocale() != 'en')
            <script src="https://npmcdn.com/flatpickr/dist/l10n/{{app()->getLocale()}}.js"></script>
        @endif

        <script>
             document.addEventListener('livewire:load', function () {
      Livewire.on('setDate', () => {
           addPickerToElement($('.dat'));
       });
      
        
    });
            function addPickerToElement(el, min_date = "today") {
                return flatpickr(el, {
                    locale: "{{app()->getLocale()}}",
                    enableTime: false,
                    allowInput: false,
                    minDate: min_date,
                });
            }
        </script>
    @endpush
</div>
