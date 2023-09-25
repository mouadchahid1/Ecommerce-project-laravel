@extends("admin.admin_dashboard") 
@section("admin")  
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route("aminities.create")}}" class="btn btn-inverse-info"><i data-feather="plus" class="me-2 icon-md"></i>Add Aminitie</a>
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
            <th>Aminitie name</th>
           @can(["edit_aminite"])
           <th>Action</th> 
           @endcan
           
     
          </tr>
        </thead>
        <tbody>
            @foreach ($aminities as $key => $item )
                 
          
          <tr>
            <td> {{$key+1}} </td>
            <td> {{$item->amenitie_name}} </td>
           
            <td class="d-flex align-items-center gap-2">
            @can("edit_aminite")
                <a href="{{ route('aminities.edit',['aminity'=>$item->id] ) }}" class="btn btn-inverse-warning">Edit</a>
            @endcan 
            @can("delete type")
                <form action="{{ route('aminities.destroy', $item->id) }}" method="post">
                    @csrf 
                    @method("delete")
                    <button class="btn btn-inverse-danger delete-button" type="submit" id="delete">Delete</button>
                </form>
             @endcan
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