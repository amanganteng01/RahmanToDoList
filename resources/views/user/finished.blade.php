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

<h3 class="container">My Finished Tasks</h3>
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
