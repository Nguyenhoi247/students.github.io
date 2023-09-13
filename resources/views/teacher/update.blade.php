
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">Teacher Management | update</h2>
  <br>
  <!--  -->
  <!-- <form action ="/update"  method ="PUT" class="form-group" style="width:70%; margin-left:15%;"> -->
  <form action ="{{url('teacher/update/' .$users->id ) }}" method = "POST" class="form-group" style="width:70%; margin-left:15%;">
  @csrf

    <label class="form-group">First Name:</label>
      <input type="text" class="form-control" value="{{$users->first_name}}" placeholder="First Name" name="first_name">
    <label>Last Name:</label>
      <input type="text" class="form-control" value="{{$users->last_name}}" placeholder="Last Name" name="last_name">
    <label>Email:</label>
     <input type="text" class="form-control" value="{{$users->email}}" placeholder="Enter Email" name="email"><br>
    <button type="submit" id="saveBtn"  value = "Add student" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>