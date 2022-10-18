
    <style>td, tr{ vertical-align: middle; }</style>

    @extends('layouts.app')

    @section('content')

<div class="container mt-5 ">
    <div class=" row mx-md-n5">
 
        <div style="margin-top:10px;" class="col-sm-12 px-md-5">
            <div stle="margin-top:50px"><h2>Registered Students</h2></div>
        <table  class="table table-hover ml-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Reg No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Image</th>
                    @if (Auth::user()->role=='1')
                    <th scope="col">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                 @foreach ($std as $st)
                    <tr>
                        <th>{{$st->id}} </th>
                        <td>{{$st->regno}}</td>
                        <td>{{$st->name}}</td>
                        <td>{{$st->marks}}</td>
                        <td><img src="images/{{$st->file}}" alt="img" width="100px" height="100px"></td>
                        <td>
                            {{-- @if(Auth::user()->role =='1')
                            <a href="{{url('/edit',$st->id)}}" class="btn btn-info btn-sm ">Edit</a>
                            <a href="{{url('/delete',$st->id)}} " class="btn btn-danger btn-sm">Delete</a>
                            <a href="{{url('/view_detail',$st->id)}}" class="btn btn-info btn-sm ">View</a>
                            @elseif (Auth::user()->name==$st->name)
                            <a href="{{url('/view_detail',$st->id)}}" class="btn btn-info btn-sm ">View</a>
                            @endif --}}
                            <a href="{{url('/edit',$st->id)}}" class="btn btn-info btn-sm ">Edit</a>
                            
                            @can('admin')
                            <a href="{{url('/delete',$st->id)}} " class="btn btn-danger btn-sm">Delete</a>
                            <a href="{{url('/view_detail',$st->id)}}" class="btn btn-info btn-sm ">View</a>
                            @endcan

                            {{-- @if (Auth::user()->name==$st->name)
                            <a href="{{url('/view_detail',$st->id)}}" class="btn btn-info btn-sm ">View</a>
                            @endif --}}
                     
                              @can('view',$st)
                              <a href="{{url('/view_detail',$st->id,$st)}}" class="btn btn-info btn-sm ">View</a>
                              @endcan
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        </div>
    </div>
</div>

@endsection

