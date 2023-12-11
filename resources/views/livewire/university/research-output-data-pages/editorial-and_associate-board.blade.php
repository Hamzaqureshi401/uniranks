@for($i = 0; $i<$add_new_board_member; $i++) 
@if($i > 0)
<br>
@endif
<div class="card">
   <div class="card-body">
      <div class="blue h5">{{ ($editorialData[$i]['editoral'] ?? '') }} Board</div>
      <div class="row mt-2">
         <div class="col-md-6 col-12 d-flex flex-column justify-content-between">
            <div class="d-md-flex align-items-center">
               <div class="col-md-4"><img src="https://1.daeux.com/UR/new/assets/profile/3.png" class="w-100 profile-img"></div>
               <div class="col-md-8 blue col-marg">Upload {{ $editorialAndAssociate['editor'] ?? ''}} in Chief Photo</div>
            </div>
            <div class="mobile-marg-2">
               <div class="form-floating w-100">
                  <input wire:model.defer="orc_id.{{$i}}" class="form-control input-field" id="floatingInput" placeholder="ORCID id">
                  <label for="floatingInput">@lang('ORCID id')</label>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-12 mobile-marg-2">
            <div>
               <div class="form-floating w-100">
                  <input wire:model.defer="chief_last_name.{{$i}}" class="form-control input-field" id="floatingInput" placeholder="Editor in Cheif First &amp; Last Name">
                  <label for="floatingInput">{{ $editorialAndAssociate['editor'] ?? ''}} in Cheif First &amp; Last Name</label>
               </div>
            </div>
            <div class="mt-3">
               <div class="form-floating w-100">
                  <input wire:model.defer="chief_email.{{$i}}" class="form-control input-field" id="floatingInput" placeholder="Email">
                  <label for="floatingInput">@lang('Email')</label>
               </div>
            </div>
            <div class="mt-3">
               <div class="form-floating w-100">
                  <input wire:model.defer="chief_profile_url.{{$i}}" class="form-control input-field" id="floatingInput" placeholder="Editor in Cheif Profile URL">
                  <label for="floatingInput">{{ $editorialAndAssociate['editor'] ?? ''}} in Cheif Profile URL</label>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endfor
<div class="d-md-flex justify-content-end align-items-end mt-1">
   <div class="col-md-4 col-12 text-place-end mt-3 mb-4">
    <button class="m-0 button-no-bg w-90" wire:click="addEditorBoard" type="button">+ Add Editorial Board</button>
</div>
<div class="col-md-4 col-12 text-place-end mt-3 mb-4">
    <button class="m-0 button-no-bg w-90" wire:click="addAssociateBoard" type="button">+ Add Associate Board</button>
</div>
</div>
<div class="w-100 px-4">
   <hr>
</div>