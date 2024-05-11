@extends('layouts.app')
@section('content')
<div class="page-heading">
  <div class="page-content">
    @include('layouts.toast')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Daftar Jadwal Asesmen</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th style="white-space:nowrap">Ruang Asesmen</th>
                    <th>Asesor</th>
                    <th>Peserta</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jadwal as $as)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$as->ruangAsesmen->nama}}</td>
                    <td>{{$as->asesor}}</td>
                    <td>{{$as->peserta}}</td>
                    <td style="white-space: nowrap">
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editJadwal{{$as->id}}">
                        Edit</button>
                      <form action="{{route('admin.jadwal.hapus', $as->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  <div class="modal fade" id="editJadwal{{$as->id}}" tabindex="-1"
                    aria-labelledby="editJadwal{{$as->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editJadwal{{$as->id}}">Edit Asesmen</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('admin.jadwal.edit', $as->id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="ruang_asesmen_id" class="form-label">Ruang</label>
                              <select name="ruang_asesmen_id" id="ruang_asesmen_id"
                                class="form-control @error('ruang_asesmen_id') is-invalid @enderror">
                                <option value="">Pilih Ruang</option>
                                @foreach ($ruangAsesmen as $r)
                                <option value="{{$r->id}}" {{$r->id == $as->ruang_asesmen_id ? 'selected' : ''}}>
                                  {{$r->nama}}</option>
                                @endforeach
                              </select>
                              @error('ruang_asesmen_id')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="asesor" class="form-label">Asesor</label>
                              <input type="text" class="form-control @error('asesor') is-invalid @enderror" id="asesor"
                                name="asesor" value="{{$as->asesor}}">
                              @error('asesor')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="peserta" class="form-label">Peserta</label>
                              <input type="text" class="form-control @error('peserta') is-invalid @enderror"
                                id="peserta" name="peserta" value="{{$as->peserta}}">
                              @error('peserta')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
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
            <h4 class="card-title">Tambah Jadwal Asesmen</h4>
          </div>
          <div class="card-body">
            <form action="{{route('admin.jadwal.create')}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Ruang</label>
                <select name="ruang_asesmen_id" id="ruang_asesmen_id"
                  class="form-control @error('ruang_asesmen_id') is-invalid @enderror">
                  <option value="">Pilih Ruang</option>
                  @foreach ($ruangAsesmen as $r)
                  <option value="{{$r->id}}">{{$r->nama}}</option>
                  @endforeach
                </select>
                @error('ruang_asesmen_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Asesor</label>
                <input type="text" class="form-control @error('asesor') is-invalid @enderror" id="asesor" name="asesor">
                @error('asesor')
                <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Peserta</label>
                <input type="text" class="form-control @error('peserta') is-invalid @enderror" id="peserta"
                  name="peserta">
                @error('peserta')
                <div class="text-danger">{{$message}}</div>
                @enderror
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