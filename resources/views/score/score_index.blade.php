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
    <h2 class="text-center">Score Management | Score</h2>
    <br>
    <form action="/score" method="POST" class="form-group" style="width:70%; margin-left:15%;">

      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"><input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

      <label>Student Name:</label>
      <select name="student_id">
          <option class="" disabled selected>Select</option>
            @foreach($students as $student)
              <option class="form-control" value="{{$student->id}}">
                  {{$student->first_name}}{{$student->last_name}}
              </option>
            @endforeach
      </select>

      <label>Subject Name:</label>
      <select name="subject_id">
          <option class="" disabled selected>Select</option>
            @foreach($subjects as $subject)
              <option class="form-control" value="{{$subject->id}}">
                {{$subject->subject_name}}
              </option>
            @endforeach
      </select></br>


      <label>Score Point:</label>
      <input type="text" class="form-control" id="" placeholder="Score Point" name="score_point">
      </select>
      <button type="submit" value="Add score" class="btn btn-primary">Submit</button>
    </form>
  </div>

</body>

</html>