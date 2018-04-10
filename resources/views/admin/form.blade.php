@extends('layout.admin') 
@section('content')

<h1>upload form test</h1>

<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
      <input type="file" class="form-control-file" name="file" id="" placeholder="" aria-describedby="fileHelpId">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection