@extends("admin.admin_dashboard") 
@section("admin") 
 
<div class="page-content">

    
    <div class="row profile-body">
       
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                    <h6 class="card-title">Edit Role</h6>

  <form class="forms-sample" id="myForm"  method="post" action="{{route('role.permission.update',$role->id)}}"> 
          @csrf
            <div class="mb-3 form-group">
                <label for="role_id" class="form-label">Role name</label>
                  <h3 class="text-info"> {{$role->name}} </h3>
            </div> 
                
            <div class="form-check mb-2 form-group">
                <input type="checkbox" class="form-check-input" id="checkCheckedmain"  >
                <label class="form-check-label" for="checkChecked">
                  All permission
                </label>
            </div> 

            <hr>
      @foreach ($group_names as $group )
    

        <div class="row">
            <div class="col-3 "> 
               <div class="form-check mb-2 form-group">
                 
                 <label class="form-check-label" for="checkChecked"> {{$group->group_name}} </label>
               </div> 
            </div> 
          
       @php
           $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
       @endphp 
 
            <div class="col-9">
                @foreach ($permissions as $permission )
                <div class="form-check mb-2 form-group">
                    <input type="checkbox" name="permission[]"  {{$role->hasPermissionTo($permission->name) ? "checked"  :""}} class="form-check-input" id="checkChecked{{$permission->id}}" 
                     value="{{$permission->id}}" >
                    <label class="form-check-label text-capitalize" for="checkChecked{{$permission->id}}">
                        {{$permission->name}}
                    </label>
                </div> 
                @endforeach
                <br>
            </div> 
           
        </div> 
     @endforeach
           
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
                        role_id: {
                            required : true,
                        },  
                        group_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                        role_id: {
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
                $("#checkCheckedmain").on("click",function() {
                   if($(this).is(":checked")) { 
                      $("input[type=checkbox]").prop("checked",true);
                    } 
                    else {
                        $("input[type=checkbox]").prop("checked",false);
                    }
                })
            });
            
        </script>
          
          
          
  
@endsection 