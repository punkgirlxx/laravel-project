<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Demo - KB - 26-01-2025</title>

  <link rel="preconnect" href="https://fonts.bunny.net">
   <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}" >
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>


    <div class="nav">
    @guest
      <a href="{{route('show.login')}}"> Login </a>
      <a href="{{route('show.register')}}"> Register </a>
    @endguest

    @auth
      <a href="{{route('dashboard.create')}}"> Create New </a>
      <form action ="{{ route('logout')}}" method= "POST">
        @csrf
        <button class="btn">Logout</button>
      </form>
    @endauth
  </div>
