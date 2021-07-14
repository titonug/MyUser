@extends('master')

@section('judul_halaman')

@section('judul_konten')

@section('konten')

<div class="col">
    <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="post">Post</label>
            <div class="col-sm-12">
                <small class="form-text text-muted">Title</small>
                <textarea id="title" name="title" rows="2" cols="140"></textarea> 
                
                <small class="form-text text-muted">Type your post</small>
                <textarea id="post" name="post" rows="8" cols="140"></textarea>
                <br>

                @csrf

                <input type="submit" value="Submit" class="btn btn-primary">
                <br>
            </div>
        </div>

    </form>
</div>

<div>
    <span class="fs-4">This Is Your Post</span>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Title Post</th>
            <th>Your Post</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $list2)
        <tr>
            <td>{{ $list2['title'] }}</td>
            <td>{{ $list2['body'] }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection