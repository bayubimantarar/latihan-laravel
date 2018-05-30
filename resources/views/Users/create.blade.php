<html>
  <head>
    <title>Users</title>
  </head>
  <body>
    <center>
      <h1>Users</h1>
        <form action="{{ route('users.store') }}" method="post">
          @csrf
          <p>Name : <input type="text" name="name" /></p>
          <p>E-mail : <input type="text" name="email" /></p>
          <p>Password : <input type="password" name="password" /></p>
          <p><input type="submit" name="store" value="Save" /></p>
      </form>
    </center>
  </body>
</html>
