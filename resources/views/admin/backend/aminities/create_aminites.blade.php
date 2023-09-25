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
  
                    <h6 class="card-title">Create Aminitie</h6>

  <form class="forms-sample" id="myForm"  method="post" action="{{route('aminities.store')}}"> 
          @csrf
            <div class="mb-3 form-group">
                <label for="amenitie_name" class="form-label">Type name</label>
                <input type="text" class="form-control" 
                id="amenitie_name"  name="amenitie_name" > 
                
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

       
        
         <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        amenitie_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                        amenitie_name: {
                            required : 'Please Enter FieldName',
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