@extends("admin.admin_dashboard") 
@section("admin") 
<div class="page-content">

    
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div>
                    <img class="wd-70 rounded-circle" src="{{(!empty($userData->photo))
                     ? url('upload/admin_images/'.$userData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                    <span class="h4 ms-3  ">{{$userData->name}}</span>
                </div>
              
            </div>
             <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
              <p class="text-muted">  {{ \Carbon\Carbon::parse($userData->created_at)->format('F d, Y') }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted"> {{$userData->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted">{{$userData->phone}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted"> {{$userData->address}}</p>
            </div>
            <div class="mt-3 mb-2 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                    <h6 class="card-title">Update Admin Profile</h6>

      <form class="forms-sample"  method="post" action="{{route("admin.profile.store")}}" enctype="multipart/form-data"> 
          @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" autocomplete="off" name="username" value="{{old('username',$userData->username)}}">
            </div>  

            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" required class="form-control" id="name" autocomplete="off" name="name" value="{{old('name',$userData->name)}}">
            </div>  

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" required class="form-control" id="email" autocomplete="off" name="email" value="{{old('email',$userData->email)}}">
            </div> 

            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="phone" class="form-control" id="phone autocomplete="off" name="phone" value="{{old('phone',$userData->phone)}}">
            </div> 

            <div class="mb-3">
                <label for="address" class="form-label"> Address</label>
                 <textarea class="form-control" id="address"  name="address"  cols="10" rows="5">{{old('address',$userData->address)}}</textarea>

            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo Profile</label>
               <input class="form-control" name="photo" type="file" id="imageFile">  
            </div> 

            <div class="mb-3">
                <img id="showimage" class="wd-70 rounded-circle" src="{{(!empty($userData->photo))
                 ? url('upload/admin_images/'.$userData->photo) : url('upload/no_image.jpg')}}" alt="profile">
              
            </div>
                        
              <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        
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

        <style type="text/css">
        #address {
          resize: none ;
        }
        </style>  
         
        <script type="text/javascript">
          $(function() {
            $("#imageFile").on("change", function(e) {
              var reader = new FileReader();
              reader.onload = function(e) {
                $("#showimage").attr("src", e.target.result);
              }; 
               
              reader.readAsDataURL(e.target.files[0]);
            });
          }); 
         
          </script> 
          
          
        
@endsection