
{{--
   KB - 26-01-2025
   main landing after log in or register
   used to view all the entries to the dashboard
--}}

<!DOCTYPE html>
@include('components.header')
<body>
    <div >
        <h1 class="text-5xl">Dashboard</h1>

        <table id="dashboard">
          <tr>
            <th>title</th>
            <th>Category</th>
            <th></th>
          </tr>

            @foreach ($records as $user)
            <tr>
              <td>{{ $user->title }}</td>
              <td>{{ $user->category }}</td>
              <td><a href="{{route('dashboard.show',[$user->id])}}" class="py-1 border-b">more details</a></td>
              </tr>
            @endforeach


        {{ $records->links() }}
    </div>
</body>
</html>
