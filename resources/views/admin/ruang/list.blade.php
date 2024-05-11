@extends('layouts.app')

@section('content')
<div class="page-heading">
  <div class="page-content">
    <div class="row">
      @include('layouts.toast')

      <div class="col-md-12 col-lg-12 col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Tambah Ruang</h4>
            <a class="btn btn-primary " data-bs-toggle="collapse" data-bs-target="#collapseCard">
              <i class="bi bi-x"></i>
            </a>
          </div>
          <div id="collapseCard" class="collapse show">
            <div class="card-body">
              <form action="{{route('admin.ruang.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="lantai" class="form-label">Lantai</label>
                  <select class="form-select @error('lantai_id') is-invalid @enderror " id="lantai" name="lantai_id"
                    required>
                    <option selected disabled>Pilih Lantai</option>
                    @foreach ($lantaiList as $l)
                    <option value="{{$l->id}}">{{$l->lantai}}</option>
                    @endforeach
                  </select>
                  @error('lantai_id')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Ruang</label>
                  <input type="text" class="form-control @error('menu') is-invalid @enderror " id="nama" name="menu">
                  @error('menu')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                {{-- upload video --}}
                <div class="mb-3">
                  <label for="video" class="form-label">Video</label>
                  <input type="file" class="form-control @error('video') is-invalid @enderror " id="video" name="video">
                  {{-- progress bar --}}
                  <div class="progress mt-2">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  @error('video')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                {{-- is desc bool --}}
                <div class="mb-3">
                  {{-- radio --}}
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_desc" id="is_desc1">
                    <label class="form-check-label" for="is_desc1">
                      Is Desc
                    </label>
                  </div>
                </div>
                <div class="mb-3 desc">
                  <label for="title_desc" class="form-label">Title Desc</label>
                  <input type="text" class="form-control" id="title_desc" name="title_desc">
                </div>
                <div class="mb-3 desc">
                  <label for="body_desc" class="form-label">Body Desc</label>
                  <textarea class="form-control" id="body_desc" name="body_desc"></textarea>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Ruang</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Lantai</th>
                    <th>Nama Ruang</th>
                    <th>Title Desc</th>
                    <th>Body Desc</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ruang as $r)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$r->lantai->lantai}}</td>
                    <td>{{$r->menu}}</td>
                    <td>{{$r->title_desc}}</td>
                    <td>{{$r->body_desc}}</td>

                    <td>
                      <a href="{{route('admin.ruang.hapus', $r->id)}}" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
  // datatable
  $(document).ready(function () {
    $('.table').DataTable();
  });

  // hide .desc on load
  $('.desc').hide();

  // show .desc on radio change
  $('input[type=checkbox][name=is_desc]').change(function () {
    if (this.checked) {
      $('.desc').fadeIn();
      // change value
      $('input[name=is_desc]').val(1);
    } else {
      $('.desc').fadeOut();
      // change value
      $('input[name=is_desc]').val(0);
    }
  });

  // progress bar before send form
  $('form').ajaxForm({
    beforeSend: function () {
      $('.progress').fadeIn();
      var percentVal = '0%';
      $('.progress-bar').width(percentVal);
      $('.progress-bar').html(percentVal);
    },
    uploadProgress: function (event, position, total, percentComplete) {
      var percentVal = percentComplete + '%';
      $('.progress-bar').width(percentVal);
      $('.progress-bar').html(percentVal);
    },
    success: function () {
      var percentVal = '100%';
      $('.progress-bar').width(percentVal);
      $('.progress-bar').html(percentVal);
    },
    complete: function (xhr) {
      if (xhr.status == 200) {
        $('.progress').fadeOut();
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: 'Data berhasil disimpan',
        }).then(() => {
          window.location.reload();
        });
      } else {
        $('.progress').fadeOut();
        Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Data gagal disimpan',
        });
      }
    }
  });
</script>
@endsection