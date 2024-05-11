<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in</title>
  <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
  <link rel="stylesheet" href="{{asset('style.css')}}">
</head>

<body>
  <div class="container">

    <div class="row d-flex justify-content-center align-items-center" style="min-height:40vmax">
      <div class="col-md-6">
        @include('layouts.toast')
        <div class="card card-primary">
          <div class="card-body">
            {{-- logo --}}
            <div class="text-center mb-4">
              <img src="{{ asset('images/logo.png') }}" alt="logo" width="300">
            </div>

            <form method="POST" action="{{ route('signin') }}">
              @csrf

              {{-- username --}}
              <div class="mb-3">
                <label for="username" class="form-label">{{ __('Username') }}</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                  name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>



              <div class="d-grid">
                <button type="submit" class="btn btn-primary">{{ __('Sign In') }}</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>