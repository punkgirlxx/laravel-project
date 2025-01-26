<!DOCTYPE html>
@include('components.header')

{{--
   KB - 26-01-2025
   register
   used to register to the dashboard, will show errors
   uses built in function to check passwords the same
--}}


<body>
        <div>
          <form action= "{{route('register')}}" method="POST">
            @csrf
            <h2>register</h2>

            <label for="name">Name:</label>
            <input
            type="text"
            name="name"
            required>

            <label for="Email">Email:</label>
            <input
            type="email"
            name="email"
            required>

            <label for="password">Password:</label>
            <input
            type="password"
            name="password"
            required>

            <label for="password_confirmation">Confirm Password:</label>
            <input
            type="password"
            name="password_confirmation"
            required>

            <button type="submit" class ="btn mt-4">Register</button>

            @if ($errors->any())
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
            @endif
          </form>
        </div>
       </body>
</html>
