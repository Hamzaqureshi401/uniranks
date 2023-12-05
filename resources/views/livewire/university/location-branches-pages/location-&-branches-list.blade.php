<div class="card-body">
                   <div class="h4 blue">Location And Branches List</div>
 
<div>
    <table class="table">
        <thead>
            <tr>
                <!-- <th class="gray">ID</th> -->
                <th class="gray">University</th>
                <th class="gray">By</th>
                <th class="gray">Campus Type</th>
                <th class="gray">Country</th>
                <th class="gray">City</th>
                <th class="gray">Campus Name</th>
                <th class="gray">Campus Address</th>
                <th class="gray">Campus Map Link</th>
                <!-- <th>Branch Name in Other Language</th>
                <th>Branch Address in Other Language</th> -->
                <th class="gray">Created</th>
                <th class="gray">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locationAndBranches as $branch)
            <tr>
                <!-- <td>{{ $branch->id }}</td> -->
                <td>{{ $branch->university->university_name ?? '--' }}</td>
                <td>{{ $branch->user->name }}</td>
                <td>@if($branch->campus_type == 0){{ 'Branch' }}@else{{ 'Main'}} @endif</td>
                <td>{{ $branch->country->country_name }}</td>
                <td>{{ $branch->city->city_name }}</td>
                <td>{{ $branch->campus_name }}</td>
                <td><a href="{{ $branch->campus_address_txt }}" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="light-blue">View</a></td>
                <td>{{ $branch->campus_map_link }}</td>
                <!-- <td>{{ $branch->branch_name_other_lang ?? '--' }} </td>
                <td>{{ $branch->branch_address_other_lang ?? '--' }} </td> -->
                <td>{{ $branch->created_at }}</td>
               <td>
                  <a wire:click="edit({{ $branch->id }})" data-bs-toggle="modal" data-bs-target="#exampleModal" class="light-blue ms-2">Edit</a>
                  <a wire:click="delete({{ $branch->id }})" class="red ms-2">Delete</a>
              </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

