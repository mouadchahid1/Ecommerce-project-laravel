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
  
                    <h6 class="card-title">Update Role</h6>

  <form class="forms-sample" id="myForm"  method="post" action="{{route('roles.update',["role"=>$role->id])}}"> 
          @csrf
          @method("put")
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Role name</label>
                <input type="text" class="form-control" 
                id="name"  name="name" value="{{old('name',$role->name)}}" >
            </div> 
                
                
           
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        
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

       
        
         <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        name: {
                            required : true,
                        },  
                        group_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                        name: {
                            required : 'Please Enter FieldName',
                        },
                        group_name: {
                            required : 'Please Choise option',
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