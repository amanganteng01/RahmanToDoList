@extends('user.layout')
@section('content')

<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @elseif(session('danger'))
    <div class="alert alert-danger alert-dismissible">
        {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @php
        $no = 1;
    @endphp

<h3 class="container">My Tasks</h3>
    <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#CreateList">Create</button>
    <div class="modal fade" id="CreateList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new list</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  action="{{ route('create') }}" method="POST">
            @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Title">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea name="description" id="description" class="form-control mt-3" placeholder="Short Descryption" required maxlength="50"></textarea>
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</form>
  </div>
</div>
    <div class="mt-4">

        <div class="card text-start">
            <div class="card-body">
                <table class="table table-striped table-hover mt-2">
                    <thead class="table">
                        <tr>
                            <th>Pin</th>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Completed at</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                     <tbody>
                        @foreach ($task as $item)
                        <tr>
                        <td>
                            <a href="{{ route('pinned', Crypt::encrypt( $item->id )) }}" style="text-decoration: none; color: black">
                                @if ($item->is_pinned == 1)
                                <i class="ri-pushpin-fill"></i>
                                @else
                                <i class="ri-pushpin-line"></i>
                                @endif
                            </a>
                        </td>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            @if ($item->is_completed == 1)
                            Finished
                            @else
                            Not Finished yet
                            @endif
                        </td>
                        <td>{{ $item->completed_at}}</td>
                        <td>
                            @if ($item->is_completed == 0)
                            <a href="{{ route('finished', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-info" onclick="return confirm('Sudah mengerjakan {{ $item->title  }}?')">Finished</a>
                            @endif
                            <a href="{{ route('deleted', Crypt::encrypt( $item->id )) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin data list {{ $item->title }} ini dihapus?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
