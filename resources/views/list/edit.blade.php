@extends('master')

@section('judul_halaman', $title)

@section('judul_konten', $titleContent)

@section('konten')
<div class="col">
<form action="{{ route('list.update', $data['id'] ) }}" method="POST">
    @method('PUT')

    <div class="form-group row">
        <label for="name">Name</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" required
            value="{{ old('name') ?? $data['name'] ?? '' }}"/>
            <small class="form-text text-muted">This is the name</small>
        </div>
    </div>

    <div class="form-group row">
        <label for="email">Email</label>
        <div class="col-sm-10">
            <input name="email" type="text" class="form-control" required 
            value="{{ old('email') ?? $data['email'] ?? '' }}"/>
            <small class="form-text text-muted">This is the email</small>
        </div>
    </div>

    <div class="form-group row">
        <label for="phone">Phone</label>
        <div class="col-sm-10">
            <input name="phone" type="text" class="form-control" required 
            value="{{ old('phone') ?? $data['phone'] ?? '' }}"/>
            <small class="form-text text-muted">This is the phone</small>
        </div>
    </div>

    @csrf

    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('list.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
</div>

@endsection