<div>
    @if(!empty($details_in_langs))
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
                                        <option value="en" selected>@lang('English')</option>
                                        @foreach($languages->whereNotIn('code' , 'en') as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">@lang('Select Language') </label>
                                </div>

                            </div>
                            
                         <div class="col-md-7">
                                    <select wire:model.defer="name_type.{{$i}}" wire:change="setPrimaryAndSecondry({{$i}})" id='type-{{$i}}' class="form-select input-field"
                                             aria-label="">
                                        <option value="">@lang('Select Name Type')</option>
                                        @php
                                        if($flag == 1){
                                            $val = end($setVal);
                                        }else {
                                            $val = $other_val;    
                                        }
                                        @endphp
                                        @foreach($type[$val] as $key => $t)
                                        <option value="{{ $key }}">{{$t}}</option>
                                        @endforeach
                                       
                                    </select>
                                    
                                </div>
                        </div>
                    
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-floating w-100">
                                <input type="text" wire:model.defer="name.{{$i}}" class="form-control input-textarea"
                                          placeholder="@lang('University Name')" rows="7">
                                <label for="floatingInput">@lang('University Name')</label>
                            </div>
                        </div>
                    </div>
                    @endif
                @endfor
                @endif


                </div>
                
               
                <!-- <div class="text-end"><a href="javascript:void(0)" wire:click="delete()" class="red ">@lang('Delete Primary Name')</a></div> -->


                <div class="d-md-flex justify-content-end align-items-end">
                <div class="col-md-9 col-12 text-place-end mb-4 mt-2 bn">
                    <button class="m-0 button-no-bg w-130"  wire:click="addDetailsInOtherLanguage"
                                type="button"> @lang('Include the name of the university, a variation of it, or its name in another language.')</button>
                            </div>
                            @if($details_in_langs > 1)
                             <div class="col-md-3 col-12 text-place-end mt-3 mb-4">
                    <button wire:click="saveSecondryName" class="m-0 button-no-bg w-90" type="button" id="my-show">@lang('+ Add secondry name')</button>
                </div>
                @endif
                           
                </div>
</div>
