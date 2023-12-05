<div>
    <div class="h4 blue mt-5">
        @lang('University Name')
    </div>
    <div class="paragraph-style2 blue">
        @lang('add the university name, it is important to add the legal university name in different languages')
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <x-general.status-alert name="status"/>
            <form>
                <div class="row justify-content-between">
                    <div @class(['col-md-12'])>
                        <div  class="form-floating w-100">
                            <input wire:model.defer="university_name" class="form-control input-field" id="floatingInput" placeholder="Primary University Name in English">
                            <label for="floatingInput">@lang('Primary University Name in English')</label>
                        </div>
                        <x-jet-input-error for="university_name" class="mt-2" />
                    </div>
{{--                    <div class="col-md-4 mobile-marg-2">--}}
{{--                        <div class="form-floating w-100">--}}
{{--                            <select wire:model.defer="translations.{{$i}}" class="form-select input-field"--}}
{{--                                    id="floatingSelectGrid" aria-label="">--}}
{{--                                <option value="">@lang('Select Language')</option>--}}
{{--                                @foreach($languages as $language)--}}
{{--                                    <option--}}
{{--                                        value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <label for="floatingSelectGrid">@lang('Select Language') </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                <br>
                <hr>
                <div class="text-end"><a href="javascript:void(0)" wire:click="delete()" class="red ">@lang('Delete')</a></div>
                <div class="d-md-flex mt-3 mb-3 text-place-end justify-content-end">
                    <button wire:click="save" class="m-0 button-no-bg" type="button" id="my-show">@lang('Update primary name')</button>
                </div>
            </form>
        </div>
    </div>
    <x-general.loading wire:target="save" message="Updating..." />
</div>
