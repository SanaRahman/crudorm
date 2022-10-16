
    @extends('layouts.app')

    @section('content')
<div class="container mt-5 ">
    <div class=" row mx-md-n5">
    <div class="col-sm-12 px-md-5">
        <div class="d-flex justify-content-between"><h2>Registration Form</h2>
            <a style="font-size:12pt" href="{{route('show')}}" class="float-right btn btn-info btn-sm">View Students</a></div>
       
<form action="" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="regno" class="form-label">Registration Number</label>
    <input type="text" class="form-control" id="regno" name="regno" required>
    @if($errors->has('regno'))
    <p class="text-danger">{{$errors->first('regno')}} </p>
    @endif
</div>
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
</div>

<div class="mb-3">
    <label for="marks" class="form-label">Marks</label>
    <input type="number" class="form-control" id="marks" name="marks" required>
</div>
<div class="mb-3">
    <label for="marks" class="form-label">Upload File</label>
    <input type="file" class="form-control" id="file" name="file" required>
</div>
<button type="submit" class="btn btn-primary">Submit</button>


</form>
@if (session()->has('status'))
<div class="alert alert-sucess mt-5">
    {{session('status')}}
</div> 
@endif

      </div>


    </div>
  
</div>
@endsection

