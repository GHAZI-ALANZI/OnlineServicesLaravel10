@extends('services.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-family: Monoton, sans-serif;
  font-weight: 400;font-style: normal;" class="mt-4 mb-4">Online Services</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success mt-4 mb-4" href="{{ route('services.create') }}"> Create New Service</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered table-dark">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $service->image }}" width="100px"></td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->detail }}</td>
            <td>
                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $services->links() !!}
        
@endsection