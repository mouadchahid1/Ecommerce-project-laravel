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
  
                    <h6 class="card-title">Create Permission</h6>

  <form class="forms-sample" id="myForm"  method="post" action="{{route('permissions.update',["permission"=>$permission->id])}}"> 
          @csrf 
          @method("put")
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Type name</label>
                <input type="text" class="form-control" 
                id="name"  value="{{old('name',$permission->name)}}" name="name" >
            </div> 
                <div class="mb-3">
                    <label class="form-label">Groupe name</label>
                    <select class="group_name_permission form-select form-group" name="group_name" data-width="100%">
                        <option value=""></option>
                        <option value="amenties" {{$permission->group_name == "amenties" ? "selected" :""}} >amenties</option>
                        <option value="proprety type" {{$permission->group_name == "proprety type" ? "selected" :""}} >Proprety Type</option>
                        <option value="status" {{$permission->group_name == "status" ? "selected" :""}} >status</option>
                       
                    </select>
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