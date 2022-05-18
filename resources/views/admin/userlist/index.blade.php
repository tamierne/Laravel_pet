@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 200px">Name</th>
                        <th>Albums</th>
                        <th style="width: 150px">Status</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @foreach($user->albums as $album)
                                <a href="{{ route('album.show', $album->id) }}" class="btn btn-primary btn-sm">{{ $album->title }}</a>
                                @endforeach
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        @if ($user->is_admin != 0)
                                            <button type="submit" class="btn btn-block btn-default btn-flat" name="is_admin" value='0'>Set as User</button>
                                        @else
                                            <button type="submit" class="btn btn-block btn-success btn-flat" name="is_admin" value='1'>Set as Admin</button>
                                        @endif
                                </form>
                                <form class="inline-block" action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-block btn-danger btn-flat" value='Delete'>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
         <form method="post" action="{{ route('user.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Account name</label>
                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                 </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
            </div>
            </div>

            <div class="card-body">
            <button type="submit" class="btn btn-primary" name="is_admin" value="0">Register as user</button>
            <button type="submit" class="btn btn-secondary" name="is_admin" value="1">Register as admin</button>
            </div>
        </form>
        </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection