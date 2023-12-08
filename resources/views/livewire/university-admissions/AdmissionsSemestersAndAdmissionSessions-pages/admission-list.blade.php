

               
               <div class="card-body">
                   <div class="h4 blue">Semesters &amp; Admission Sessions</div>
                   <table class="table">
    <thead>
        <tr class="blue">
            <!-- <th>#</th> -->
            
            <th>Semester</th>
            <!-- Add more headers for other columns as needed -->
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <!-- <th>Status</th>
            <th>Type</th> -->

            <!-- Include headers for all columns -->
            <th>Created At</th>
            <th>View </th>
            <th>Edit </th>
            <th>Delete </th>
        </tr>
    </thead>
    <tbody>
        @foreach($review_request as $request)
            <tr class="blue">
                <!-- <td>{{ $loop->index + 1 }}</td> -->
                
                <td>{{ $request->semester->name ?? '--' }}</td>
                <!-- Fetch other columns similarly -->
                <td>{{ $request->description ?? '--' }}</td>
                <td>{{ $request->start_date ?? '--' }}</td>
                <td>{{ $request->end_date ?? '--' }}</td>
               <!--  <td>{{ $request->status ?? '--' }}</td>
                <td>{{ $request->type ?? '--' }}</td> -->
                <td>{{ $request->created_at ?? '--' }}</td>
                <td> <div class="z-index-100"><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="light-blue">Note</a></div></td>
                <td><div class="z-index-100"><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="light-blue">Edit</a></div></td>
                <td><div class=""><a href="javascript:void(0)" wire:click="delete('{{$request->id}}')" class="red">Delete</a></div></td>
                
            </tr>
        @endforeach
    </tbody>
</table>

</div>

                   
              

               
               <div class="card-body">
                   <div class="h4 blue">Semesters &amp; Admission Sessions Under Review</div>
                   <table class="table">
    <thead>
        <tr class="blue">
            <!-- <th>#</th> -->
            
            <th>Semester</th>
            <!-- Add more headers for other columns as needed -->
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <!-- <th>Status</th>
            <th>Type</th> -->

            <!-- Include headers for all columns -->
            <th>Created At</th>
            <th>View </th>
            <th>Edit </th>
            <th>Delete </th>
        </tr>
    </thead>
    <tbody>
        @foreach($review_request as $request)
        @foreach($request->updateRequests as $data)
            <tr class="blue">
                <!-- <td>{{ $loop->index + 1 }}</td> -->
                
                <td>{{ $data->semester->name ?? '--' }}</td>
                <!-- Fetch other columns similarly -->
                <td>{{ $data->description ?? '--' }}</td>
                <td>{{ $data->start_date ?? '--' }}</td>
                <td>{{ $data->end_date ?? '--' }}</td>
               <!--  <td>{{ $request->status ?? '--' }}</td>
                <td>{{ $request->type ?? '--' }}</td> -->
                <td>{{ $data->created_at ?? '--' }}</td>
                <td> <div class="z-index-100"><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="light-blue">Note</a></div></td>
                <td><div class="z-index-100"><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="light-blue">Edit</a></div></td>
                <td><div class=""><a href="javascript:void(0)" wire:click="deleteRecord('{{$data->id}}')" class="red">Delete</a></div></td>
                
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
                   
              