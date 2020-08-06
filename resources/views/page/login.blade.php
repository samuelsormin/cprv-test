<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple App! - Login</title>  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('css/authentication.css') }}" />
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <h2>Simple App!</h2>
      <div class="form-control">
        @if ($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
          </div>
        @endif
        <form method="POST" action="{{ route('authenticate') }}">
          @csrf
          <input name="pin" 
            onkeypress="return isNumeric(event)"
            oninput="maxLengthCheck(this)"
            type = "number"
            placeholder="Pin Number"
            class="security-disc" />

            <button class="btn-primary" type="submit">Log In</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<script>
  function maxLengthCheck(object) {
    if (object.value.length > 4)
      object.value = object.value.slice(0, 4)
  }
    
  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
</script>