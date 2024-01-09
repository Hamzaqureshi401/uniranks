<div class="card bg-transparent mt-4">
<div class="card-body mt-3 bg-body-color">
    <div class="h5 blue">@lang('Conferences')</div>
    <div class="w-100 px-4 mt-3">
        <hr>
    </div>

    <div class="table-responsive">
        <table class="table">
            <tbody>
                @foreach($academics as $academic)
                <tr>
                    <td class="blue">{{ empty($academic->first_name) ? '--' : $academic->first_name }}</td>
                    <td class="blue">
                         {{ $academic->created_at ? $academic->created_at->format('D, M j, Y g:i A') : '--' }}
                    </td>
                    <td class="blue">By {{ $academic->user->name }}</td>
                    <td class="text-place-end">
                        
                        <a href="#" class="light-blue mr-25">View</a>
                        <a href="javascript:void(0);" class="light-blue mr-25" wire:click.prevent="edit('{{$academic->id}}')">@lang('Edit')</a>
                        <a href="javascript:void(0)" wire:click="delete('{{$academic->id}}')" class="red">@lang('Delete')</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<x-jet-modal wire:model="isModalOpen">
   <x-slot name="title">
            @lang('Update Academics Record')
        </x-slot>
        <!-- <div class="modal-body"> -->
            <!-- Livewire component rendering the slots -->
            @if($edit_item)
              <div class="blue h5">Add Academics</div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.first_name" class="form-control input-field" placeholder="Full Academic Name in English">
                  <label for="floatingInput">@lang('Full Academic Name')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.email" class="form-control input-field" placeholder="Academic Email">
                  <label for="floatingInput">@lang('Academic Email')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-12 col-12">
               <div class="row">
                  <div class="col-12">
                     <div class="form-floating w-100">
                        <select wire:model.defer="edit_item.title" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                           
                           <option>Title</option>
                           <option>Prof</option>
                           <option>Mr</option>
                           <option>Mrs</option>
                        </select>
                        <label for="floatingSelectGrid">@lang('Title')</label>
                     </div>
                  </div>
                  <div class="col-12 mt-3">
                     <div class="form-floating w-100">
                        <select wire:model.defer="edit_item.position" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                           <option>Position</option>
                        </select>
                        <label for="floatingSelectGrid">@lang('Position')</label>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12 col-12 mobile-marg-2 mt-3">
               <div class="form-floating w-100">
                  <select wire:model.defer="edit_item.school_id" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option>Select School</option>
                     @foreach($schools as $key => $value)
                                    <option value="{{$value->id}}" >{{$value->school_name}}</option>
                                @endforeach
                  </select>
                  <label for="floatingSelectGrid">@lang('Select School')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-12 col-12">
               <div class="">
                  <select wire:model.defer="edit_item.college_id" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option value="1">Select College</option>
                     <option value="1">Select College1</option>
                  </select>
                  <!-- <label for="floatingSelectGrid">@lang('Select College')</label> -->
               </div>
            </div>
            <div class="col-md-12 col-12 mobile-marg-2 mt-3">
               <div class="">
                  <select wire:model.defer="edit_item.department_id" class="form-select input-field" id="floatingSelectGrid" aria-label="">
                     <option value="1">Select Department</option>
                     <option value="1">Select Department1</option>
                  </select>
                  <!-- <label for="floatingSelectGrid">@lang('Select Department')</label> -->
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.profile_page_web_url" class="form-control input-field" placeholder="Academic Profile Page, Website, or URL">
                  <label for="floatingInput">@lang('Profile, Website, or URL')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.orcid" class="form-control input-field" placeholder="ORCID ID">
                  <label for="floatingInput">@lang('ORCID ID')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.web_of_science_research_id" class="form-control input-field" id="floatingInput" placeholder="Web of Science ResearchID">
                  <label for="floatingInput">@lang('Web of Science Research')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.scopus_author_id" class="form-control input-field" id="floatingInput" placeholder="Scopus Author ID">
                  <label for="floatingInput">@lang('Scopus Author ID')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.research_gate_link" class="form-control input-field" id="floatingInput" placeholder="Researchgate Link">
                  <label for="floatingInput">@lang('Research gate Link')</label>
               </div>
            </div>
            <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.google_scholar_link" class="form-control input-field" id="floatingInput" placeholder="Google Scholar Link">
                  <label for="floatingInput">@lang('Google Scholar Link')</label>
               </div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6 col-12">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.linkedin_url" class="form-control input-field" id="floatingInput" placeholder="Linkedin URL">
                  <label for="floatingInput">@lang('Linkedin URL')</label>
               </div>
            </div>
           <!--  <div class="col-md-6 col-12 mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="edit_item.academic_email" class="form-control input-field" id="floatingInput" placeholder="Academic Email">
                  <label for="floatingInput">@lang('Academic Email')</label>
               </div>
            </div> -->
         </div>
         <div class="w-100 px-4 mt-3">
            <hr>
         </div>
        
         @for($i = 0; $i<$edit_details_in_langs; $i++)
           
            <br>
         <div class="card">
            <div class="card-body">          
         <div class="language-div-3">
            <div class="mt-3 row">
               <div class="col-md-5 col-12">
                  <div class="form-floating w-100">
                    <select wire:model.defer="editTranslations.{{$i}}" class="form-select input-field">
                                        <option value="">@lang('Select Language')</option>
                                        @foreach($languages as $language)
                                            <option
                                                value="{{$language->code}}" @disabled(in_array($language->code,$translations))>{{$language->native_name}}</option>
                                        @endforeach
                                    </select>
                     <label for="floatingSelectGrid">@lang('Select Language')</label>
                  </div>
               </div>
               <div class="col-md-7 col-12 mobile-marg-2">
                  <div class="form-floating w-100">
                     <input wire:model.defer="names.{{$i}}" class="form-control input-field" placeholder="Academic Name">
                     <label for="floatingInput">@lang('Academic Name')</label>
                  </div>
               </div>
            </div>
         </div>
         </div>
         </div>
         
         @endfor
    <div class="d-md-flex justify-content-end align-items-center mt-1">
            <div class="col-md-8 col-12 text-place-end mt-3 mb-3">
               
               <button class="m-0 button-no-bg" wire:click="addEditDetailsInOtherLanguage" type="button">
      @lang('+ Add Name in Different Language')
      </button>

            </div>
         </div>        <div class="col-md-12 mt-3">
                     <a href="javascript:void(0)" wire:click="update()" class="btn btn-primary">@lang('Update Academics')</a>
            </div>
            @endif
         <!-- </div> -->
         </x-jet-modal>
