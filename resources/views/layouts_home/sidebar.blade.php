<!--Main Navigation-->
<header>
    <!-- Sidebar -->


    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-yellow fixed-top p-0 px-5 py-2">
        {{-- logo --}}
        <a class="navbar-brand ps-5 pe-3" href="#">
            <img src="{{ asset('uploads/' . $setting->logo) }}" alt="" style="height: 130px;">
        </a>

        <div class="row d-flex w-100 justify-content-center ">
            <div class="col-12 judul-website text-center fw-bold">
                <h1 class="title">{{ $setting->title }}</h1>
            </div>
            <div class="row sosmed px-5">
                <div class="col-3">
                    <a href="{{ $setting->instagram }}" class="text-dark fw-bolder lh-base">
                        <i class="bi bi-instagram "></i>
                        pupr_bpsdm_balaipensi
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ $setting->facebook }}" class="text-dark fw-bolder">
                        <i class="bi bi-facebook "></i>
                        Balai Penilaian Kompetensi
                    </a>
                </div>
                <div class="col-5">
                    <a href="{{ $setting->youtube }}" class="text-dark fw-bolder">
                        <i class="bi bi-youtube "></i>
                        PUPR_BPSDM_Balai Penilaian Kompetensi
                    </a>
                </div>
                {{-- whatsapp --}}
                <div class="col-3">
                    <a href="https://wa.me/{{ $setting->whatsapp }}" class="text-dark fw-bolder">
                        <i class="bi bi-whatsapp "></i>
                        {{ $setting->whatsapp }}
                    </a>
                </div>
                {{-- twitter --}}
                <div class="col-3">
                    <a href="{{ $setting->twitter }}" class="text-dark fw-bolder">
                        <i class="bi bi-twitter "></i>
                        PUPR_BalaiPensi
                    </a>
                </div>
                {{-- web --}}
                <div class="col-5">
                    <a href="{{ $setting->web }}" class="text-dark fw-bolder">
                        <i class="bi bi-globe "></i>
                        {{ $setting->web }}
                    </a>
                </div>
            </div>

        </div>
        {{-- banner --}}
        <a class="navbar-brand" href="#">
            <img src="{{ asset('uploads/' . $setting->banner) }}" alt="" style="height: 130px;">
        </a>

        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-sidebar">
            <div class="position-sticky">
                <div class="list-group list-group-flush m-0 p-0 ">
                    <a href="#"
                        class="list-group list-group-item list-group-item-action py-2 ripple  fw-bold fs-2 text-center floor-title py-4">
                        <span>{{ strtoupper($floor->lantai) }}</span>
                    </a>
                    @foreach ($menus as $menu)
                        <a href="#{{ $menu->menu_slug }}"
                            class="list-group list-group-item list-group-item-action py-2 ripple text-white text-center py-4 fs-5"
                            data-slug="{{ $menu->menu_slug }}">
                            <span>{{ $menu->menu }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="dll">
                <div class="maskot-container">
                    <img class="maskot" src="{{ asset('uploads/1715344055.png') }}" alt=""
                        style="height: 200px;">
                </div>
                <div class="time"></div>
            </div>

        </nav>
    </nav>

</header>

<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59

        if (h == 24) {
            h = 0;
        }

        if (h < 10) {
            h = "0" + h;
        }

        if (m < 10) {
            m = "0" + m;
        }

        var time = h + "." + m;
        document.querySelector('.time').innerText = time;
        document.querySelector('.time').textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
</script>
