@extends("admin.admin_dashboard") 
@section("admin")  
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('admin.create')}}" class="btn btn-inverse-info"><i data-feather="plus" class="me-2 icon-md"></i>Add Admin</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Data Table</h6>
      <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>S1</th>
            <th>Photo</th>
            <th>Name</th> 
            <th>Email</th>
            <th>Phone</th> 
            <th>Role</th>
            <th>Action</th>
     
          </tr>
        </thead>
        <tbody>
            @foreach ($dataAdmins as $key => $item )
                 
          
          <tr>
            <td> {{$key+1}} </td>
            <td>  <img src="{{(!empty($item->photo)) ? url('upload/admin_images/'.$item->photo)  
            : url('upload/no_image.jpg')}}" alt="image"> </td> 
            <td> {{$item->name}} </td>
            <td> {{$item->email}} </td>
            <td> {{$item->phone}} </td> 
            <td>
              @foreach ($item->roles as $role )
                <span class="badge badge-pill bg-primary">{{$role->name}}</span>
              @endforeach
            </td>
           
            
            <td class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.edit',$item->id ) }}" class="btn btn-inverse-warning">Edit</a>
            
                <form action="{{ route('admin.delete', $item->id) }}" method="post">
                    @csrf 
                    @method("delete")
                    <button class="btn btn-inverse-danger delete-button" type="submit" id="delete">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div> 

@endsection