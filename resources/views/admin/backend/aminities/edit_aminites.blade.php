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
  
                    <h6 class="card-title">Update Aminitie</h6>

  <form class="forms-sample"  method="post" action="{{route('aminities.update',['aminity'=>$amenities->id])}}"> 
          @csrf 
          @method("put")
            <div class="mb-3">
                <label for="amenitie_name" class="form-label">Type name</label>
                <input type="text" class="form-control" 
                id="amenitie_name"  name="amenitie_name"  value="{{old('amenitie_name',$amenities->amenitie_name)}}"> 
                
            </div> 
          
                  <button type="submit" class="btn btn-primary me-2">Update</button>
                        
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