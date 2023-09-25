@extends("admin.admin_dashboard") 
@section("admin")  
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
           
          <a href="{{route('roles.create')}}" class="btn btn-inverse-info me-3"><i data-feather="plus" class="me-2 icon-md"></i>Add Permission</a>
           
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
            <th>Role name</th> 
        
      
            <th>Action</th>
     
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $item )
                 
          
          <tr>
            <td> {{$key+1}} </td>
            <td> {{$item->name}} </td> 
            
            
            <td class="d-flex align-items-center gap-2">
                <a href="{{ route('roles.edit',['role'=>$item->id] ) }}" class="btn btn-inverse-warning">Edit</a>
            
                <form action="{{ route('roles.destroy', $item->id) }}" method="post">
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