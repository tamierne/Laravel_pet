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
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">New album create</h3>
        </div>
            
    <form method="post" action="{{ route('album.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Album name</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
            
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create!</button>
        </div>
    </form>
    </div>
      
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection