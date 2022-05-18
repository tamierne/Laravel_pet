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
        <div class="card card-success">
          <div class="card-body">
            <div class="input-group mb-3">
              <form method="post" action="{{ route('album.store') }}">
                @csrf
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Create new album?" name="title">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>
              </form>
            </div>
            <div class="row">
              @if( count($albums) === 0 )
                  Well, it's time to create something!
              @else
                  @foreach ($albums as $album)
                  <div class="col-md-12 col-lg-6 col-xl-4">
                    {{-- <div class="card mb-2 bg-gradient-dark"> --}}
                      <a href="{{ route('album.show', $album->id) }}"><img class="card-img-top" src="../dist/img/photo1.png"></a>
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                          <h5 class="card-title text-primary text-black">{{ $album->title }}</h5>
                          <a href="{{ route('album.show', $album->id) }}" class="btn btn-block btn-outline-secondary btn-xs mb-1">View album</a>
                            <form method="Post" action="{{ route('album.destroy', $album->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block btn-outline-danger btn-xs">Delete</button>
                            </form>
                        </div>
                    {{-- </div> --}}
                  </div>
                  @endforeach
                @endif
            </div>
          </div>
      </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection