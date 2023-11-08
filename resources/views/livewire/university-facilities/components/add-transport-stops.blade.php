<div>
    @php
        /**
        * @var \App\Models\General\Language  [] $languages
        **/
    @endphp
    <div class="h4 blue mt-3">@lang('Stops and plans')</div>
    <div class="card mt-4">
        <div class="card-body" id="upload-images-card">
            <x-jet-validation-errors class="mt-3 mb-3 alert alert-danger"/>
            <div class="row mt-3">
                @foreach($translations as $i=>$lang)
                    <div class="col-md-6 mobile-marg my-1">
                        <div class="form-floating w-100">
                            <input wire:model.defer="names.{{$i}}" class="form-control input-field"
                                   placeholder="@lang('Stop Title in') {{$language_names[$lang]}}">
                            <label for="floatingInput">@lang('Stop Title in') {{$language_names[$lang]}}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-3" x-data="{addDatePicker(){
            $('.time').flatpickr({
            noCalendar: true,
            enableTime: true,
            dateFormat: 'h:i K',
            allowInput: true
            });
            }}" x-init="addDatePicker()" x-on:add-picker.window="addDatePicker()">
                @foreach($times as $i => $time)
                <div class="col">
                    <div class="form-floating w-100">
                        <input wire:model.defer="times.{{$i}}.time" class="form-control input-field time"
                               placeholder="@lang('Time')">
                        <label for="floatingInput">@lang('Time')</label>
                    </div>
                </div>
                @endforeach
                <div class="col-md-2">
                    <a href="" wire:click.prevent="add_stop" class="light-blue">@lang('add another time+')</a></div>
            </div>
            <div class=" text-place-end mt-4 mb-4">
                <button class="m-0 button-no-bg" wire:click="save" type="button">
                    @lang('Save Stops')
                </button>
            </div>
        </div>
    </div>
    <x-general.loading message="Processing..."/>
</div>
