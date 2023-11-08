<div>
    <x-general.university-media-page-title sub-title="About"/>
    <div class="card mt-1">
        <div class="card-body">
            <div class="blue paragraph-style2">
                @lang('This is not just about the university, using attractive information and facts that can support the student decision process.<br>
                the about section support multiple languages.')
            </div>
            <div>
                <div class="row">
                    <div class="col-12">
                        <div
                            class="blue mt-3 mb-3">@lang('English Language will be default about, you can create about section using other languages')
                            .
                        </div>
                    </div>
                </div>
                @for($i = 0; $i<$details_in_langs; $i++)
                    @if($i > 0)
                        <div class="w-100 px-5 mt-4">
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-floating w-100">
                                    <select wire:model.defer="translations.{{$i}}" class="form-select input-field"
                                             aria-label="">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">@lang('Select Language') </label>
                                </div>

                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating w-100">
                                <textarea wire:model.defer="descriptions.{{$i}}" class="form-control input-textarea"
                                          placeholder="@lang('University About')" rows="7"></textarea>
                                <label for="floatingInput">@lang('University About')</label>
                            </div>
                        </div>
                    </div>
                @endfor
                <div class="d-md-flex justify-content-end align-items-center">
                    <div class="col-md-6 text-place-end mt-4 mb-4">
                        <button class="m-0 button-no-bg" wire:click="addDetailsInOtherLanguage"
                                type="button"> @lang('+ Add about in different')</button>
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
    <x-general.loading message="Processing..."/>

    @foreach($about_translations as $key=>$about)
        @php
            $lang = $languages->where('code',$key)->first()?->native_name;
        @endphp
        <div class="card bg-transparent mt-4">
            <div class="card-body">
                <div class="w-100">
                    <div class="row">
                        <div class="h5 blue">@lang('University About in') {{$lang}}</div>
                        <p class="paragraph-style2 blue">
                            {{$about}}
                        </p>
                        <div class="w-100 mt-4 px-4">
                            <hr>
                        </div>
                        <div class="d-md-flex h6 blue justify-content-between">
                            <div class="">{{$lang}}</div>
                            {{--                        <div class="">Created on 15 Jan 2022</div>--}}
                            {{--                        <div class="">By David Scott</div>--}}
                            @if($key != 'en')
                                <div class=""><a href="javascript:void(0)" wire:click="deleteTranslation('{{$key}}')"
                                                 class="red ">@lang('Delete')</a></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
