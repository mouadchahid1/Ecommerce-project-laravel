@extends("admin.admin_dashboard") 
@section("admin") 
<div class="page-content">

    
    <div class="row profile-body">
        <div class="col-md-9 col-xl-9 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
        
                        <h6 class="card-title">Create Admin</h6>
        
          <form class="forms-sample" id="myForm"  method="post" action="{{route("admin.store")}}"  > 
              @csrf
                <div class="mb-3 form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" autocomplete="off" name="username" value="{{old('username')}}">
                </div>  
        
                <div class=" form-group mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text"   class="form-control" id="name" autocomplete="off" name="name" value="{{old('name')}}">
                </div>  
        
            
        
                <div class=" form-group mb-3">
                  <label for="phone-input" class="form-label">Phone</label>
                  <input type="phone" class="form-control"  id="phone-input"   name="phone" data-inputmask="'mask': '+212 999999999'">
                </div> 
        
                <div class="mb-3  form-group">
                    <label for="address" class="form-label"> Address</label>
                     <textarea class="form-control" id="address"  name="address"  cols="10" rows="5">{{old('address')}}</textarea>
                </div>  
        
                 <div class="mb-3 form-group">
                        <label for="roles" class="form-label">Roles </label>
                        <select class="role_name form-select form-group"  id="roles" name="roles" data-width="100%">
                            <option value=""></option> 
                            @foreach ($roles as $role )
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                   </div>  
                   
                   <div class="mb-3  form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"   class="form-control" id="email" autocomplete="off" name="email" value="{{old('email')}}">
                  </div> 

                <div class="mb-3  form-group">
                    <label for="password" class="form-label">Password</label>
                   <input class="form-control" name="password" type="password" id="password">  
                </div> 
        
                
                            
                  <button type="submit" class="btn btn-primary me-2">Add</button>
                            
            </form>
        
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
    $(document).ready(function (){
      $('#myForm').validate({
        rules: {
           email: {
                    required : true,
                },  
                password: {
                    required : true,
                },  
                roles: {
                    required : true,
                }, 
                    
                },
                messages :{
                    name: {
                        required : 'Please Enter Email',
                    },
                    password: {
                        required : 'Please enter Password',
                    },  
                    roles: {
                        required : 'Please choise role',
                    }, 
                        
    
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
      </script>    
          
          
  
@endsection