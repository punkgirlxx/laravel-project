<!DOCTYPE html>
@include('components.header')

{{--
   KB - 26-01-2025
   create
   used to create new entry to the dashboard, will show errors
   if i had more time i would make the dashboard look better,
   make the category a fixed dropdown box as i assume for a business there be pre determined categories and add the attach file options
--}}

<body>
  <div>
    <form action= "{{route('dashboard.store')}}" method="POST">
      @csrf
      <h2>add new </h2>

      <label for="title">title:</label>
      <input
      type="text"
      name="title"
      required>

      <label for="category">category:</label>
      <input
      type="text"
      name="category"
      required>

      <label for="body">body:</label>
      <input
      type="text"
      name="body"
      required>

      <label for="is_draft">is Draft:</label>
      <input
      type="checkbox"
      name="is_draft">

      <button type="submit" class ="btn mt-4">submit</button>

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
