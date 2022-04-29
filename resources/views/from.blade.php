<form action='{{route('edit')}}' method="POST" enctype="multipart/form-data">
      @csrf
    <input type="hidden" value={{$data['id']}} name="id">
    <input type="text" name="name" placeholder="Enter Name" value={{$data['name']}}><br><br>
    <input type="text" name="email" placeholder="Enter Email"  value={{$data['email']}}><br><br>
    <input type="text" name="text" placeholder="Enter Message"  value={{$data['text']}}><br><br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
  @endif
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <input type="file" name="up" id="chooseFile" ><br><br>
  <button type="submit">Submit</button>
 </form>               
    
      
