@extends('layouts_home.app')

@section('konten')
    <div class="row">
        <div class="col">
            <div class="embed-responsive embed-responsive-16by9 video">
                <iframe class="embed-responsive-item" src="{{ asset('uploads/video.mp4') }}" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col">

            @if ($menus->is_desc == 1)
                <div class="card judul">
                    <div class="card-header isi text-center p-3">
                        <h4>{{ $menus->title_desc }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $menus->body_desc }}</p>
                    </div>
                </div>
            @else
                <div class="card asesmen">
                    <div class="card-header isi text-center p-3">
                        <h4>Jadwal Asesmen</h4>
                    </div>
                    @foreach ($asesmen as $a)
                        <div class="card-body isi-asesmen">
                            <div class="row jadwal-asesmen">
                                <div class="col ruangan">
                                    <p class="card-text">{{ $a->nama }}</p>
                                </div>
                                <div class="col orang-asesmen">
                                    <p class="card-text">Asesor:</p>
                                    <p class="card-text">{{ $a->asesor }}</p>
                                    <p class="card-text">Peserta:</p>
                                    <p class="card-text">{{ $a->peserta }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
