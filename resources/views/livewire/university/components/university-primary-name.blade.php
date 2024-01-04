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
                            <input wire:model.defer="university_name" id="university_name_input" class="form-control input-field" placeholder="Primary University Name in English">
                            <label for="floatingInput">@lang('Primary University Name in English')</label>
                        </div>
                        <x-jet-input-error for="university_name" class="mt-2" />
                        <div class="d-md-flex justify-content-end align-items-end mt-1">
                         <div class="col-md-3 col-12 text-place-end mt-3 mb-4">
                    <button wire:click="save" class="m-0 button-no-bg w-90 show_btn" disabled type="button" >@lang('Update primary name')</button>
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
                                   <select wire:model.lazy="translations.{{$i}}" wire:change="langSelected('{{$i}}')"  class="form-select input-field" aria-label="">
                                        <option value="{{'en'}}" selected>@lang('English')</option>
                                        {{--  @disabled(in_array($language->code,$translations)) --}}
                                        @foreach($languages->whereNotIn('code' , 'en') as $language)
                                            <option value="{{$language->code}}">{{$language->native_name}}</option>
                                        @endforeach
                                    </select>

                                    <label for="floatingSelectGrid">@lang('Select Language') </label>
                                </div>

                            </div>
                            
                         <div class="col-md-7">
                                 @if(!empty($translations[$i]) && !$show_name_type[$i])
                                    <select wire:model.defer="name_type.{{$i}}" id='type-{{$i}}' class="form-select input-field"
                                             aria-label="">
                                        <option value="">@lang('Select Name Type')</option>
                                       
                                        @foreach($type as $key => $t)
                                        <option value="{{ $key }}">{{$t}}</option>
                                        @endforeach
                                       
                                    </select>
                                    
                                </div>
                                @endif
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


                </div>
                
               
                <!-- <div class="text-end"><a href="javascript:void(0)" wire:click="delete()" class="red ">@lang('Delete Primary Name')</a></div> -->


                <div class="d-md-flex justify-content-end align-items-end">
                <div class="col-md-9 col-12 text-place-end mb-4 mt-2 bn">
                    <button class="m-0 button-no-bg w-130" wire:click="addDetailsInOtherLanguage"
                                type="button"> @lang('Include the name of the university, a variation of it, or its name in another language.')</button>
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


<div class="card bg-transparent mt-4">
    <div class="card-body">
        <div class="h4 blue">@lang('University Name')</div>
         <div class="w-100 px-4 mt-3">
        <hr>
    </div>
     <table class="table">
    <!-- <thead>
        <tr>
            <th>@lang('Phone Number')</th>
            <th>@lang('Created on')</th>
            <th>@lang('By')</th>
            <th></th>
        </tr>
    </thead> -->
    <tbody>
        @forelse($secondry_translations as $uni)
            <tr>
                <td class="blue">
                     @if($uni->name_type == 1)
                            @lang('Primary')
                            @else
                            @lang('Secondry')
                            @endif

                </td>
                <td class="font-light blue">{{ $uni->name }}</td>
                
                <td class="font-light blue">{{$uni->language->native_name ?? "---"}}</td>
                <td class="text-end blue">
                    <a href="javascript:void(0)" wire:click="edit('{{$uni->id}}')" class="light-blue">@lang('Edit')</a>
                </td>
                <td class="text-end blue">
                     
                    <a href="javascript:void(0)" wire:click="deleteName('{{$uni->id}}')" class="red">@lang('Delete')</a>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">@lang('No Name Added Yet!')</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
<div class="modal fade" id="slotsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Livewire component rendering the slots -->
                @if($edit)
                <div  class="row">
                    <div class="col-md-12 mt-3">
                            <input wire:model.defer="edit_name" id="university_name_input" class="form-control input-field" placeholder="Primary University Name in English" value="{{ $edit->name }}">
                        
                    </div>
                   @if($edit->name_type == 2)
                        @php 
                            arsort($edit_type);
                        @endphp
                    @endif
                    <div class="col-md-12 mt-3">
                        <select wire:model.defer="edit_name_type" class="form-select input-field"
                                             aria-label="">

                                        
                                        @foreach($edit_type as $key => $t)
                                        <option value="{{ $key }}">{{$t}}</option>
                                        @endforeach
                                       
                                    </select>
                    </div>
                    <div class="col-md-12 mt-3">
                    <a href="javascript:void(0)" wire:click="updateSecondryName({{$edit->id}})" class="btn btn-primary">@lang('Update Name')</a>
                    </div>

                </div>

                    
                @else
                    <p>No Data available</p>
                @endif
            </div>
        </div>
    </div>
</div>
</div>



    <script>
    $(document).ready(function() {
        $('#university_name_input').on('input', function() {
            let updatedUniversityName = $(this).val();
            console.log('University name changed to: ' + updatedUniversityName);
            var name = @json($university_name);
            if(name != updatedUniversityName){
                $('.show_btn').prop('disabled', false);
               
            }else{
                $('.show_btn').prop('disabled', true);
                
            }
            if(updatedUniversityName == ''){
                $('.show_btn').prop('disabled', true);
                
            }
            // Perform other actions or interactions here based on the updated value.
        });
        $('.show_btn').prop('disabled', true);
    });

     $(document).ready(function() {
        $('select[name^="name_type."]').change(function() {
            var selectedValue = $(this).val();
            console.log(selectedValue);
            var nameTypeInputs = $('select[name^="name_type."]');
            nameTypeInputs.not(this).val(selectedValue == 1 ? 2 : 1);
        });
    });

      document.addEventListener('livewire:load', function () {
        console.log(1);
        Livewire.on('showSlotsModal', () => {
            $('#slotsModal').modal('show'); // Show the modal when the event is emitted
        });
    });
     document.addEventListener('livewire:load', function () {
        Livewire.on('closeModal', () => {
            $('#slotsModal .btn-close').click(); // Hide the modal when the event is emitted
            $('#slotsModal').modal('show');
        });
    });
</script>
       
   
</div>
