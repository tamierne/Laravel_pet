<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.css') }}">
</head>
<body>
    <div>
        <div class="card-header">
            <h3 class="card-title">Login</h3>
        </div>
            
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Account name</label>
                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="check" id="check">
                <label class="form-check-label" for="check">Check me out</label>
            </div>
            </div>
            
            <div class="card-footer">
                <div class="d-inline-flex">
                <button type="submit" class="btn btn-primary btn-flat">Login!</button>
                <a href="{{ route('home') }}" class="btn btn-block btn-secondary btn-flat ml-2">Back</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>