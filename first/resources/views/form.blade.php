<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <form action="{{url('/')}}/register" method="post">
        @csrf 
       @php
       $demo =1 ;
       @endphp
    <x-input type="text" name="name" label="Please enter ur name" :demo="$demo"/>
    <x-input type="email" name="email" label="Please enterEmail"/>
    <x-input type="password" name="password" label="Please enter Password"/>
    <x-input type="password" name="password-confirmed" label="Please enter Confirmed Pasword"/>

     <button class="btn btn-primary">Submit</button>
   </div>  
</form>
  </body>
</html>