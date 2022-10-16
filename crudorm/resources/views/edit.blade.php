
    @extends('layouts.app')

    @section('content')
    <div class="container mt-5 ">
        <div class=" row mx-md-n5">
        <div class="col-sm-8 px-md-5">
            <div><h2>Edit Record</h2></div>
    <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="regno" class="form-label">Registration Number</label>
        <input type="text" class="form-control" id="regno" name="regno" value="{{$std->regno}}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$std->name}}">
    </div>
    
    <div class="mb-3">

        <div><label for="marks" class="form-label">Marks</label>
            <input type="number" class="form-control" id="marks" name="marks" value="{{$std->marks}}"></div>
        

        <div>
            <label for="image" class="form-label">Upload File</label>
            <input type="file" class="form-control" id="file" name="file" >
            <input type='text' name="fi" value="{{$std->file}}" hidden>
            <img src="/images/{{$std->file}}" width="100px" height="100px" style="margin-top:10px" alt="img">
        </div>
       
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
  
    </form>
    @if (session()->has('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div> 
    @endif
    
          </div>
        </div>
    </div>  
 @endsection

