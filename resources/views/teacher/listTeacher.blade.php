<!DOCTYPE html>
<html lang="en">

<head>
  <title>View Teacher Records</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

</head>

<body>



  <div class="container">
    <h2 class="text-center">View Teacher Records</h2>
    <button type="button" class="createProduct btn btn-primary" data-toggle="modall" data-target="#demoModall">
      Create
    </button>
     <div class="container">
        <div class="row" >
            <div class="col-sm-12" align="center">
            <form id="sortTeacher" action="{{ url('teacher/sortTeacher') }}" method="POST" class="form-group">
                <p>Date: <input type="text" id="datepicker" name="created_at">  <button type="button" class="sortProduct btn btn-info btn-sm" id="saveBtn">Sort Teacher</button></p>
                @csrf
                {{ csrf_field() }}
            </form>
            </div>            
        </div>
       </div>


    
    <!-- <a href="{{ url('subjectform') }}" class="btn btn-primary"  type="button" target="_blank">Create Subject</a> -->
    <!-- <a href="{{ url('scoreform') }}" class="btn btn-primary" type="button" target="_blank">Create Score</a> -->

    <table class="table table-bordered table-striped">
      <thead >
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr name="id">
          <td >{{ $user->id }}</br> {{ $user->created_at }}</td>
          <td >
            <a {{$user->id}} href="{{ url('studentSubject/'.$user->id) }}" type="button" target="_blank">
              {{ $user->first_name }} {{ $user->last_name }}
            </a>
          </td>
          <td  id="email">{{ $user->email }}
            <form action="{{ url('teacher/delete', $user->id) }}" method="post">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm" onclick="delete_alert(event);return false;">Delete</button>
            <!-- onclick='return confirm("本当に削除しますか？")' -->



              <!-- <button type="submit" class="btn btn-danger btn-sm">Edit</button> -->

              <!-- popup-button -->
              <button data-id="{{$user->id}}" type="button" class="editProduct btn btn-primary" data-toggle="modal" data-target="#demoModal">
                Edit
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>


  </div>


  <!-- Edit-bên trong form -->
  <div class="modal fade" id="demoModalUpdate" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="container">
          <h2 class="text-center">Teacher Management | update</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeError()">
            <span aria-hidden="true">&times;</span>
          </button>
          <!--  -->
          <form id="form-update" action="" method="POST" class="form-group" style="width:70%; margin-left:15%;">
            @csrf

            <label for="first_name" class="form-group">First Name:</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="First Name" name="first_name"><br>
            @error('first_name')
                  <div class="alert alert-danger @error('first_name') is-invalid @enderror">{{ $message }}</div>
              @enderror
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="last_name" placeholder="Last Name" name="last_name"><br>
              @error('last_name')
                  <div class="alert alert-danger @error('first_name') is-invalid @enderror">{{ $message }}</div>
              @enderror
            <label for="email">Email:</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="email" placeholder="Enter Email" name="email"><br>
              @error('email')
                  <div class="alert alert-danger @error('first_name') is-invalid @enderror">{{ $message }}</div>
              @enderror
           
              <script type="text/javascript">
              @if(count($errors->update_form) > 0)
                  $('#demoModalUpdate').modal('show');
              @endif
              </script>
            <button type="submit" id="saveBtn" value="Edit student" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  </br></br></br>

  <!-- create bên trong form -->
  <div class="modal fade" id="demoModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="container">
          <h2 class="text-center">Teacher Management | create</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeError()">
            <span aria-hidden="true" onclick="">&times;</span>
          </button>
          <!--  -->

          <form enctype="multipart/form-data" id="form-create" action="create" method="POST" class="form-group" style="width:70%; margin-left:15%;">
            @csrf
            <label for="first_name" class="form-group">First Name:</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror test" id="first_name" placeholder="First Name" name="first_name"><br>
            @error('first_name')
                  <div class="alert alert-danger @error('first_name') is-invalid @enderror" >{{ $message }}</div>
              @enderror
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" name="last_name"><br>
              @error('last_name')
                  <div class="alert alert-danger @error('last_name') is-invalid @enderror">{{ $message }}</div>
              @enderror
            <label for="email">Email:</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" name="email"><br>
              @error('email')
                  <div class="alert alert-danger  @error('email') is-invalid @enderror">{{ $message }}</div>
              @enderror
            <!-- upload image -->
            @if ($message = Session::get('success'))
            <div class="alert alert-succsess alert-block">
              <strong>{{$message}}</strong>
            </div>>
            @endif
            
            <input type="file" class="form-control" name="image" id="image">
            @csrf
            <script type="text/javascript">
              @if (count($errors) > 0)
                  $('#demoModalCreate').modal('show');
              @endif
              </script>
            <button type="submit" id="saveBtn" value="Create student" class="btn btn-primary">Submit</button>

          </form>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // edit-nội dung
    $('.editProduct').on('click', function() {
      var product_id = $(this).data('id');
      $.get("{{ url( 'teacher/update/') }}" + '/' + product_id, function(data) {
        // $('$poduct_id').val('');
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#email').val(data.email);
        $('#product_id').val(data.id);
        $('#saveBtn').val('Edit-users');
        $('#form-update').attr('action', 'update/' + data.id);
        $('#demoModalUpdate').modal('show');
       
      }
    )})
    $(document).ready(function(){
      $('.sortProduct').on('click',function(e) {
        $.post("{{ url( 'teacher/sortTeacher/') }}", function(data) {
        $.ajax({
          url:'sortTeacher',
          type:'POST',
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {'id':jQuery('tr[name="id"]').val(),
          },
          success:function(data) {
            $('.sortProduct').html(data);
          },error: function() {
            alert('Error!');},
        });
  })});
  return false;
})
   
      
    
    
    $('.createProduct').on('click',function(e) {
        $('#demoModalCreate').modal('show');
        // if(count($message) > 0) {
        //     $('#Modaltitle').modal('show');
        //   }
        // ;
        })

        function closeError() {
          var testClose = document.querySelectorAll('.alert-danger');
          testClose.forEach(function(testClose){
            if (getComputedStyle(testClose).display === "block") {
                testClose.style.display = "none";
            }
          })
          // testClose1 =getComputedStyle(testClose).display === "none";
          // if(testClose1) {

            // removeClass
            // function removeClass() {
            //       var element = document.querySelectorAll('.form-control');
            //         element.forEach(function(element){
            //           element.classList.removeClass('is-invalid');
            //       })
            //     }
        } 
        
    function delete_alert(e) {
      if(!window.confirm('本当に削除しますか？')) {
        window.alert('キャンセルされました。');
        return false;
      }
      document.deleteform.submit();
    };


    // Form day month year
    $(function() {
      var datepicker = $("#datepicker").datepicker({
        changeMonth:true,
        changeYear: true
    })
      });
      
   
    var changeMonth = $(".selector").datepicker("option", "changeMonth");
    $(".selector").datepicker("option", "changeMonth", true);
    var changeYear = $(".selector").datepicker("option", "changeYear");
    $(".selector").datepicker("option", "changeYear", true);
    
   

   
    
  </script>
  
</body>

</html>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>