<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <form action="{{url('/login')}}" method="post">
      <input type="text" name="name"><br>
      <input type="password" name="pass"><br>
      {{ csrf_field() }}
      <input type="submit" name="kirim" value="kirim">
    </form>
  </body>
</html>
