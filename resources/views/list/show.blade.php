@extends('master')

@section('judul_halaman')

@section('judul_konten')

@section('konten')
<dl class="row">

    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9">{{ $data['id'] }}</dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9">{{ $data['name'] }}</dd>

    <dt class="col-sm-3">Username</dt>
    <dd class="col-sm-9">{{ $data['username'] }}</dd>

    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9">{{ $data['email'] }}</dd>

    <dt class="col-sm-3">Address</dt>
    <dd class="col-sm-9">{{ $data['address']['street'] }}</dd>
    <dt class="col-sm-3"></dt>
    <dd class="col-sm-9">{{ $data['address']['suite'] }}</dd>
    <dt class="col-sm-3"></dt>
    <dd class="col-sm-9">{{ $data['address']['city'] }}</dd>
    <dt class="col-sm-3"></dt>
    <dd class="col-sm-9">{{ $data['address']['zipcode'] }}</dd>

    <dt class="col-sm-3">Phone</dt>
    <dd class="col-sm-9">{{ $data['phone'] }}</dd>

    <dt class="col-sm-3">Website</dt>
    <dd class="col-sm-9">{{ $data['website'] }}</dd>

    <dt class="col-sm-3">Company</dt>
    <dd class="col-sm-9">{{ $data['company']['name'] }}</dd>
    <dt class="col-sm-3"></dt>
    <dd class="col-sm-9">{{ $data['company']['catchPhrase'] }}</dd>
    <dt class="col-sm-3"></dt>
    <dd class="col-sm-9">{{ $data['company']['bs'] }}</dd>

    <dt class="col-sm-3">Posts</dt>
    <table id="post" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data2 as $list2)
            <tr>
                <td>{{ $list2['title'] }}</td>
                <td>{{ $list2['body'] }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

</dl>

<a class="btn btn-primary" href="{{ route('list.index') }}" role="button">
    Back</a>


@endsection