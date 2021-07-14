@extends('master')

@section('judul_halaman')

@section('judul_konten')

@section('konten')


<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
            <th class="Actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $list)
        <tr>
            <td>{{ $list['id'] }}</td>
            <td>{{ $list['name'] }}</td>
            <td>{{ $list['username']}}</td>
            <td class="actions">
                <a href="{{ action('ListController@show', 
                    ['list' => $list['id']] )}}" alt='View' title='View'>
                    View
                </a>
                <a 
                    href="{{ action('ListController@edit', 
                    ['list' => $list['id']] )}}"
                    alt='Edit'
                    title='Edit'>
                    Edit
                </a>
                <a action="{{ route('list.destroy', 
                ['list' => $list['id']]) }}" method="POST" alt='Delete' title='Delete'>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-link" title="Delete"
                    value="DELETE">Delete</button>
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
