@for($i = 0; $i<$addNewVolume; $i++)
       @if($i > 0)
            <br>
            @endif
      
<div class="card">
   <div class="card-body">

<div class="h5 blue">Journal Volume</div>
         <div class="row mt-3">
            <div class="col-md-6">
               <div class="form-floating w-100">
                  <input class="form-control input-field" placeholder="Volume Name">
                  <label for="floatingInput">Volume Name</label>
               </div>
            </div>
            <div class="col-md-6 mobile-marg-2">
               <div class="form-floating w-100">
                  <input type="text" class="input-field basicDate form-control flatpickr-input" placeholder="Volume Issue Date" data-input="" readonly="readonly">
                  <label for="floatingInput">Volume Issue Date</label>
               </div>
            </div>
         </div>
             </div>
</div>
@endfor
         <div class="d-md-flex justify-content-end align-items-end mt-1">
            <div class="col-md-4 col-12 text-place-end mt-3 mb-4">
               <button class="m-0 button-no-bg w-90" wire:click="addNewVolume" type="button">
                  @lang('+ Add New Volume')
                  </button>
            </div>
         </div>
          <div class="w-100 px-4">
            <hr>
         </div>