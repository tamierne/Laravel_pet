@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
          <h4>{{ $album->title }}</h4>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
        <div class="card card-success">
          <div class="card-body">
            {{-- <div class="input-group mb-3">
              <form method="post" action="{{ route('album.store') }}">
                @csrf
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Create new album?" name="title">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>
              </form>
            </div> --}}
            <div class="form-group">
            <form method="post" action="{{ route('photo.upload', $album->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-label" id="image" name="image">
                  {{-- <label class="custom-file-label" for="image"></label> --}}
                </div>
                <div class="input-group-append">
                  <button class="input-group-text" type="submit">Upload</button>
                </div>
              </div>
            </form>
            </div>
            <div class="row">
              @if( count($photos) == 0 )
                  Well, it's time to create something!
              @else
                @foreach ($photos as $photo)
                <div class="col-md-auto">
                  <div class="card mb-2 bg-gradient-dark">
                    <a href="{{ $photo->getUrl() }}">
                    {{ $photo('thumb') }}
                    </a>
                      <div class="card-overlay flex-column justify-content-end">
                        {{ $photo->id }}
                          {{-- <form method="post" action="{{ route('photo.destroy', $photo->id) }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-block btn-outline-danger btn-xs">Delete</button>
                          </form> --}}
                      </div>
                  </div>
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