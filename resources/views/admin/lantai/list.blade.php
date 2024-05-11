@extends('layouts.app')
@section('content')
<div class="page-heading">
  <div class="page-content">
    @include('layouts.toast')
    <section class="row">
      <div class="col-12 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title
            ">Data Lantai</h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lantai</th>
                  <th>Ruang</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lantai as $l )
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$l->lantai}}</td>
                  <th>
                    @foreach ($l->menus as $menu)
                    <span class="badge bg-primary">{{$menu->menu}}</span>
                    @endforeach
                  </th>
                  <td>
                    {{-- make modal edit --}}
                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                      data-bs-target="#edit{{$l->id}}">
                      Edit</button>
                    <a href="{{route('admin.lantai.hapus', $l->id)}}" class="btn btn-danger btn-sm">Hapus</a>
                  </td>
                </tr>
                <div class="modal fade" id="edit{{$l->id}}" tabindex="-1" aria-labelledby="edit{{$l->id}}Label"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="edit{{$l->id}}Label">Edit Lantai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('admin.lantai.edit', $l->id)}}" method="post">
                          @csrf
                          <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lantai</label>
                            <input type="text" class="form-control" id="nama" name="lantai" value="{{$l->lantai}}"
                              required>
                          </div>
                          <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Tambah Lantai</h4>
          </div>
          <div class="card-body">
            <form action="{{route('admin.lantai.create')}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lantai</label>
                <input type="text" class="form-control" id="nama" name="lantai" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection

@section('js')
<script>
  $(document).ready(function() {
    $('.table').DataTable();
  });
</script>
@endsection