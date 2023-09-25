@extends("admin.admin_dashboard") 
@section("admin") 
<div class="page-content">

    
    <div class="row profile-body">
       
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                    <h6 class="card-title">Create property type</h6>

  <form class="forms-sample"  method="post" action="{{route("store.type")}}"> 
          @csrf
            <div class="mb-3">
                <label for="type_name" class="form-label">Type name</label>
                <input type="text" class="form-control @error('type_name') is-invalid @enderror" 
                id="type_name"  name="type_name" > 
                 @error("type_name")
                    <span class="text-danger">{{$message}}</span> 
                 @enderror
            </div> 
            <div class="mb-3">
                <label for="type_icon" class="form-label">Type icon</label>
                <input type="text" class="form-control @error('type_icon') is-invalid @enderror" 
                id="type_icon"  name="type_icon" > 
                 @error("type_icon")
                    <span class="text-danger">{{$message}}</span> 
                 @enderror
            </div> 
                  <button type="submit" class="btn btn-primary me-2">Add</button>
                        
        </form>

                </div>
              </div>
         
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
      
      <!-- right wrapper end -->
    </div>

        </div>   

       
         
        
          
          
        
@endsection