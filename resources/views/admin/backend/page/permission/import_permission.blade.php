@extends("admin.admin_dashboard") 
@section("admin") 
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
           
          <a href="{{route('export')}}" class="btn btn-inverse-danger"><i data-feather="download" class="me-2 icon-md"></i>Download xlsx</a>
        </ol>
    </nav>
    <div class="row profile-body">
       
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                    <h6 class="card-title">Import  Permission</h6>

  <form class="forms-sample" id="myForm"  method="post" action="{{route('permission.import')}}"> 
          @csrf
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Import Excel File</label>
                <input type="file" class="form-control" id="importfile"  name="importfile">
            </div> 
                 <button type="submit" class="btn btn-inverse-warning">Upload</button>              
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