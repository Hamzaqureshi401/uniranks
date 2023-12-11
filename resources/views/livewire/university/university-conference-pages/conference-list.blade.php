



@foreach(\Auth::user()->selected_university->conferences()->get() as $con)
@foreach($con->subjects as $s)
  <div class="card mt-3 bg-body-color">
                   <div class="card-body">
                       <div class="h5 blue">{{$con->title ?? '--'}}</div>
                       <div class="w-100 px-4 mt-3">
                           <hr>
                        </div>
                       <div class="d-md-flex h6 mb-0 blue justify-content-between">
                        <div class="col-md-2 mobile-marg-2">{{ $s->title ?? '--'}}</div>
                        <div class="col-md-4 mobile-marg-2">Created on {{ $con->created_at }}</div>
                        <div class="col-md-3 mobile-marg-2">By {{ $con->created_by ?? '--'}}</div>
                         
                         <div class="col-md-2 text-place-end mobile-marg-2 d-flex justify-content-between"><a href="javascript:void(0)" wire:click="delete({{ $s->id }})" class="red ms-2">Delete</a><a href="" class="light-blue">View</a><a href="" class="light-blue ">Edit</a></div>
                    </div>
                   </div>
               </div>
               @endforeach
               <hr>
@endforeach




