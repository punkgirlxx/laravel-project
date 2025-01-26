<!DOCTYPE html>
@include('components.header')

{{--
   KB - 26-01-2025
   login
   used to login to the dashboard, will show errors
--}}
<body

  <form action= "{{route('login')}}" method="POST">
    @csrf
    <h2>Login</h2>

    <label for="email">Email:</label>
    <input
      type="email"
      name="email"
      required>

      <label for="User">Password:</label>
      <input
        type="password"
        name="password"
        required>

      <button type="submit" class ="btn mt-4">Log in</button>

      @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif

    </form>
  </body>
</html>
