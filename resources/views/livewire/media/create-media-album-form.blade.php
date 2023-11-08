<div>
    @php
        /**
        * @var \App\Models\General\Language[] $languages
        **/
    @endphp
    <div class="card mt-1">
        <div class="card-body">
            <div class="blue">@lang('Create a new album')</div>
            <x-general.status-alert/>
            <form>
                @for($i = 0; $i < $details_in_langs; $i++)
                    <div>
                        <div class="row mt-2" wire:key="name-field-{{ $i }}">
                            <div class="col-md-8">
                                <div class="form-floating w-100">
                                    <input wire:model.defer="names.{{$i}}" class="form-control input-field"
                                           placeholder="@lang('New Album Name')">
                                    <label for="floatingInput">@lang('New Album Name')</label>
                                </div>
                            </div>
                            <div class="col-md-4 mobile-marg-2">
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
                        </div>
                        <div class="row mt-2" wire:key="details-field-{{ $i }}">
                            <div class="col-12 ">
                                <div class="form-floating w-100">
                            <textarea wire:model.defer="details.{{$i}}" class="form-control input-textarea"
                                      placeholder="@lang('Description')" rows="3"></textarea>
                                    <label for="floatingInput">@lang('Description')</label>
                                </div>
                            </div>
                        </div>
                        @if($i < $details_in_langs - 1)
                            <div class="w-100 px-5 mt-4">
                                <hr>
                            </div>
                        @endif
                    </div>
                @endfor

                <div class=" text-place-end mt-4 mb-4">
                    <button class="m-0 button-no-bg" id="show" type="button" wire:click="addDetailsInOtherLanguage">
                        @lang('+ Add details in other language')</button>
                </div>
                <div class="d-flex justify-content-end h6">
                    <div class=""><a href="javascript:void(0)" wire:click.prevent="save"
                                     class="light-blue">@lang('Create')</a></div>
                    <div class="ms-3"><a href="javascript:void(0)" wire:click.prevent="initForm" class="red">@lang('Cancel')</a></div>
                </div>
            </form>
        </div>
    </div>
    <x-general.loading message="Saving..." wire:target="save"/>
</div>
