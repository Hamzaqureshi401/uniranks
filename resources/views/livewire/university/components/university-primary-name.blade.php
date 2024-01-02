<div>
    <div class="h4 blue mt-5">
        @lang('University Name')
        @include('about-icon')
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
                            <input wire:model.defer="university_name" class="form-control input-field" placeholder="Primary University Name in English">
                            <label for="floatingInput">@lang('Primary University Name in English')</label>
                        </div>
                        <x-jet-input-error for="university_name" class="mt-2" />
                        <div class="d-md-flex justify-content-end align-items-end mt-1">
                         <div class="col-md-3 col-12 text-place-end mt-3 mb-4">
                    <button wire:click="save" class="m-0 button-no-bg w-90" type="button" id="my-show">@lang('Update primary name')</button>
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
                    
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-floating w-100">
                                <input type="text" wire:model.defer="translated_name.{{$i}}" class="form-control input-textarea"
                                          placeholder="@lang('University Name')" rows="7">
                                <label for="floatingInput">@lang('University Name')</label>
                            </div>
                        </div>
                    </div>
                    @endif
                @endfor


                </div>
                
               
                <!-- <div class="text-end"><a href="javascript:void(0)" wire:click="delete()" class="red ">@lang('Delete Primary Name')</a></div> -->


                <div class="d-md-flex justify-content-end align-items-end">
                <div class="col-md-4 col-12 text-place-end mb-4">
                    <button class="m-0 button-no-bg w-90" wire:click="addDetailsInOtherLanguage"
                                type="button"> @lang('+ Add University in different name')</button>
                            </div>
                            @if($details_in_langs > 1)
                             <div class="col-md-3 col-12 text-place-end mt-3 mb-4">
                    <button wire:click="saveSecondryName" class="m-0 button-no-bg w-90" type="button" id="my-show">@lang('+ Add secondry name')</button>
                </div>
                @endif
                           
                </div>
                <hr>
            </form>
             
        </div>
    </div>
    <x-general.loading wire:target="save" message="Updating..." />
<!-- <div class="card bg-transparent mt-4">
    <div class="card-body mt-3 bg-body-color">
    <div class="h5 blue">@lang('University Name')</div>
     <div class="w-100 px-4 mt-3">
        <hr>
    </div> 
    

    <div class="table-responsive">
        <table class="table">
            <tbody>
                @foreach($about_translations as $key=>$about)
                @php
                $lang = $languages->where('code',$key)->first()?->native_name;
                @endphp
                <tr>
                    <td class="blue">{{$lang}}</td>
                    <td class="text-end">
                        <a href="javascript:void(0)" class="light-blue mr-25">@lang('Edit')</a>
                        <a href="javascript:void(0)" wire:click="deleteTranslation('{{$key}}')" class="red">@lang('Delete')</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div> -->
 @foreach($about_translations as $key=>$about)
        @php
            $lang = $languages->where('code',$key)->first()?->native_name;
        @endphp
        <div class="card bg-transparent mt-4">
            <div class="card-body">
                <div class="w-100">
                    <div class="row">
                        <div class="h5 blue">@lang('University Name in') {{$lang}}</div>
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
                            
                                <div class=""><a href="javascript:void(0)" wire:click="deleteTranslation('{{$key}}')"
                                                 class="red ">@lang('Delete')</a></div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
            
   
</div>
