@extends('layouts.app')
@section('content')
<div class="page-heading">
  <h3>Setting</h3>
  <div class="page-content">
    <form action="{{ route('admin.setting') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-12 col-md-8">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="nama">Title Aplikasi</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $setting->title }}">
              </div>
              {{-- instagram, facebook, youtube, whatsapp, twitter, web --}}
              <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control" id="instagram" name="instagram"
                  value="{{ $setting->instagram }}">
              </div>
              <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $setting->facebook }}">
              </div>
              <div class="form-group">
                <label for="youtube">Youtube</label>
                <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $setting->youtube }}">
              </div>
              <div class="form-group">
                <label for="whatsapp">Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $setting->whatsapp }}">
              </div>
              <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $setting->twitter }}">
              </div>
              <div class="form-group">
                <label for="web">Web</label>
                <input type="text" class="form-control" id="web" name="web" value="{{ $setting->web }}">
              </div>
              <div class="form-group">
                <label for="teks_berjalan">Teks Berjalan</label>
                <input type="text" class="form-control" id="teks_berjalan" name="teks" value="{{ $setting->teks}}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
                <img src="{{ asset('uploads/' . $setting->logo). '?v=' . time() }}" alt="logo" class="img-fluid mt-2">
              </div>
              {{-- banner, maskot --}}
              <div class="form-group">
                <label for="banner">Banner</label>
                <input type="file" class="form-control" id="banner" name="banner">
                <img src="{{ asset('uploads/' . $setting->banner) . '?v=' . time() }}" alt="banner"
                  class="img-fluid mt-2">
              </div>
              <div class="form-group">
                <label for="maskot">Maskot</label>
                <input type="file" class="form-control" id="maskot" name="maskot">
                <img src="{{ asset('uploads/' . $setting->maskot). '?v=' . time() }}" alt="maskot"
                  class="img-fluid mt-2">
              </div>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary form-control">Simpan</button>
    </form>
  </div>
</div>
@endsection