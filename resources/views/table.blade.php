<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<table border="1" class="table table-striped table-bordered table-hover table-condensed">
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th colspan="2">Operations</th>
    <th>File  Name</th>
    <th>View File</th>
    <th>Download File</th>
    </tr>
    @foreach($dataDisplay as $member)
    <tr>
    <td>{{$member->id}}</td>
    <td>{{$member['name']}}</td>
    <td>{{$member['email']}}</td>
    <td>{{$member['text']}}</td>
    
    <td><a href={{"delete/".$member['id']}}>Delete</a></td>
    <td><a href={{"edit/".$member['id']}}>Edit</a></td>
    {{-- {{$fileN=$member->file_name}}
     @if ({{$fileN!=null}}) --}}
     <td>{{$member["file_name"]}}</td>
     <td><a href={{"view-file/".$member['id']}}><button class="ms-4 me-4">View File</button></a></td>
     <td><a href={{"download-file/".$member['id']}}><button>Download File</button></a></td> 
    {{-- @endif  --}}
    </tr>
    @endforeach
</table>
<div class="text-center">
<a href="{{route('form')}}"><button type="button" class="btn btn-outline-success">Add Member</button></a>
</div>
</body>
</html>