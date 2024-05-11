@extends('layouts.app')
@section('content')
<div class="page-heading">
  <div class="page-content">
    @include('layouts.toast')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Daftar Asesmen</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ruang</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ruangAsesmen as $as)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$as->nama}}</td>
                    <td>
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editAsesmen{{$as->id}}">
                        Edit</button>
                      <form action="{{route('admin.asesmen.hapus', $as->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  <div class="modal fade" id="editAsesmen{{$as->id}}" tabindex="-1"
                    aria-labelledby="editAsesmen{{$as->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editAsesmen{{$as->id}}">Edit Asesmen</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('admin.asesmen.edit', $as->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="nama" class="form-label">Nama Ruang</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="{{$as->nama}}">
                            </div>
                            <button type="submit" class="btn btn-primary form-control">Simpan</button>
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
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Tambah Asesmen</h4>
          </div>
          <div class="card-body">
            <form action="{{route('admin.asesmen.create')}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Ruang</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <button type="submit" class="btn btn-primary form-control">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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