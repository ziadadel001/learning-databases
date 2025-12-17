@extends('posts.layout')
 
@section('content')

<div class="card mt-5">
  <h2 class="card-header">simple CRUD</h2>
  <div class="card-body">
        
        @session("success")
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('posts.create') }}"> <i class="fa fa-plus"></i> Create New Post</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($posts as $Post)
                <tr>
                    <td>{{ $Post->id }}</td>
                    <td>{{ $Post->title }}</td>
                    <td>{{ $Post->body }}</td>
                    <td>
                        <form action="{{ route('posts.destroy',$Post->id) }}" method="POST">
           
                            <a class="btn btn-info btn-sm" href="{{ route('posts.show',$Post->id) }}"><i class="fa-solid fa-list"></i> Show</a>
            
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$Post->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>
      
        {!! $posts->links() !!}

  </div>
</div>  
@endsection