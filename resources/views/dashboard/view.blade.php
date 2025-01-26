{{--
   KB - 26-01-2025
   create
   used to show entry to the dashboard,
   if i had more time i would make this a toggle to edit before the submit to give better feel
--}}


<!DOCTYPE html>
@include('components.header')

<body>
  <div>
    <form action= "{{route('dashboard.update',[$record->id])}}" method="POST">
      @csrf
      <h2></h2>
      <label for="title">title:</label>
      <input
      type="text"
      name="title"
      value="{{$record->title}}"
      required>

      <label for="category">category:</label>
      <input
      type="text"
      name="category"
      value="{{$record->category}}"
      required
      >

      <label for="body">body:</label>
      <input
      type="text"
      name="body"
      value="{{$record->body}}"
      required
      >

      <label for="is_draft">is Draft:</label>
      <input
      type="checkbox"
      name="is_draft"
      @if ($record->is_draft ===1)
        checked
      @endif
      >

      <button type="submit" class ="btn">update</button>

      <form action= "{{route('dashboard.destroy',[$record->id])}}" method="POST">
        @csrf
        <button type="submit" class ="btn btn-delete">delete</button>
        @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
        @endif
      </div>
    </body>
</html>
