
<form action="{{route('saveUser')}}" method="post" enctype="multipart/form-data">
    @csrf
   <input type="text" name="name" placeholder="Enter Name" ><br><br>
   <input type="text" name="email" placeholder="Enter Email" ><br><br>
   <input type="text" name="text" placeholder="Enter Message"><br><br>
   
   <label>Choose File</label>
   
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
 <input type="file" name="up" ><br><br>
   <button type="submit">Submit</button>
</form>  
           
