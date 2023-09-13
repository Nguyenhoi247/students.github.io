<!DOCTYPE html>
<html lang="en">

<head>
  <title>View Student Records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>




  <div class="container">
    <h2 class="text-center">View Student Records</h2>
    <button type="button" class="createProduct btn btn-primary" data-toggle="modall" data-target="#demoModall">
      Create
    </button>

    
    <a href="{{ url('subjectform') }}" class="btn btn-primary"  type="button" target="_blank">Create Subject</a>
    <a href="{{ url('scoreform') }}" class="btn btn-primary" type="button" target="_blank">Create Score</a>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Image</th>
          <th>Subjects Name</th>
          <th>City Name</th>
          <th>Scores</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $user->id }}</br> {{ $user->created_at }}</td>
          <td>
            <a {{$user->id}} href="{{ url('studentSubject/'.$user->id) }}" type="button" target="_blank">
              {{ $user->first_name }} {{ $user->last_name }}
            </a>
          </td>

          <td>
            @if($user->image)
            <img src="{{ asset('storage/app/public/'.$user->image) }}" style="height:50px; width:100px;" />
            @else
            <span>No image found!</span>
            @endif
          </td>


          <td>
            <a {{$user->subject_id}} href="{{ url('subjectstlist/'.$user->subject_id) }}" type="button" target="_blank">{{ $user->subject_name }}</a>
          </td>


          <td>{{ $user->city_name }}</td>


          <td>{{ $user->score_point }}</td>


          <td>{{ $user->email }}
            <form action="{{ url('/delete', $user->id) }}" method="post">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>



              @csrf
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
  <div class="modal fade" id="demoModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="container">
          <h2 class="text-center">Student Management | update</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <!--  -->

          <form id="form-update" action="" method="POST" class="form-group" style="width:70%; margin-left:15%;">
            @csrf

            <label class="form-group">First Name:</label>
            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">
            <label>Last Name:</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">
            <label>City Name:</label>
            <select class="form-control" id="city_name" name="city_name">
              <option value="hanoi">Ha Noi</option>
              <option value="bacgiang">Bac Giang</option>
            </select>
            <label>Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email"><br>
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
          <h2 class="text-center">Student Management | create</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <!--  -->

          <form enctype="multipart/form-data" id="form-create" action="create" method="POST" class="form-group" style="width:70%; margin-left:15%;">
            @csrf

            <label class="form-group">First Name:</label>
            <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name">

            <label>Last Name:</label>
            <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name">

            <label>City Name:</label>
            <select class="form-control" id="city_name" name="city_name">
              <option value="hanoi">Ha Noi</option>
              <option value="bacgiang">Bac Giang</option>
            </select>

            <label>Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email"><br>

            <!-- upload image -->
            @if ($message = Session::get('success'))
            <div class="alert alert-succsess alert-block">
              <strong>{{$message}}</strong>
            </div>>

            @endif


            @csrf
            <input type="file" class="form-control" name="image" id="image">

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
      $.get("{{ url( 'update/') }}" + '/' + product_id, function(data) {
        // $('$poduct_id').val('');
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#city_name').val(data.city_name);
        $('#email').val(data.email);
        $('#product_id').val(data.id);
        $('#saveBtn').val('Edit-users')
        $('#form-update').attr('action', 'update/' + data.id);
        $('#demoModalUpdate').modal('show');
      })
    })

    $('.createProduct').on('click', function() {
      $('#demoModalCreate').modal('show');
    })
  </script>
</body>

</html>