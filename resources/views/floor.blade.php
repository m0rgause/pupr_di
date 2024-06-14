<div class="container-desc">
    <div class="row-isi row">
        <div class="col-8 col-video">
            <div class="embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item video" loop autoplay muted></video>
            </div>
        </div>
        <div class="col-4 col-isi">
            <div class="card judul">
                <div class="card-header isi text-center p-3">
                    <h4 class="title_desc"></h4>
                </div>
                <p class="body_desc"></p>
            </div>
            <div class="card asesmen">
                <div class="card-header judul-asesmen text-center p-3">
                    <h4 class="text-judul">Jadwal Asesmen Hari Ini</h4>
                </div>
                <div id="asesmen-content" class="slideIn my-5">
                    @foreach ($asesmen as $a)
                        <div class="row jadwal-asesmen">
                            <div class="col-3 ruangan">
                                <p class="card-text text-center nomor-ruangan mt-4">{{ $a->nama }}</p>
                            </div>
                            <div class="col-8 orang-asesmen">
                                <p class="card-text pelaku mt-1">Asesor:</p>
                                <p class="card-text nama">{{ $a->asesor }}</p>
                                <p class="card-text pelaku">Peserta:</p>
                                <p class="card-text nama">{{ $a->peserta }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card mushola">
                <div class="jadwal-shalat" id="jadwal-shalat"></div>
            </div>
        </div>
    </div>
</div>
