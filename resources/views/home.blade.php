<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pilih Lantai</title>
  <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
  <link rel="stylesheet" href="{{asset('style.css')}}">
</head>

<body>
  <div id="app">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center">Pilih Lantai</h1>
        </div>
        <div class="col-12">
          <div class="row d-flex justify-content-evenly">
            @foreach (DB::table('lantai')->get() as $floor)
            <div class="col-3">
              <a href="{{route('floor', $floor->id)}}" class="btn btn-primary w-100">{{ $floor->lantai }}</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>