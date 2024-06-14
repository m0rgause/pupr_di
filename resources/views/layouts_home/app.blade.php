<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@200;600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Lexend+Deca:wght@200;600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        @include('layouts_home.sidebar')
        <!-- End Navbar -->

        <!-- Content -->
        <div class="konten">
            <div class="card">
                <div class="card-header text-center p-3">
                    <h4 id="current-day"></h4>
                </div>
            </div>
            @include('floor')
            <footer class="footer">
                <div class="text-slider">
                    <marquee scrollamount="10" class="footer-slider">Selamat datang di Balai Penilaian
                        Kompetensi
                        Kementerian Pekerjaan Umum
                        dan Perumahan Rakyat yang berada di
                        Jl.Sapta Taruna Raya Komp. PU Pasar Rabu, RT.4/RW.7, Pd. Pinang, Kec. Kby Lama, Kota Jakarta
                        Selatan, Daerah
                        Khusus Ibukota Jakarta 12310</marquee>
                </div>
            </footer>
        </div>
        <!-- End Content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/assets/compiled/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function nl2br(str, is_xhtml) {
            if (typeof str === 'undefined' || str === null) {
                return '';
            }
            const breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
            return (str + '').replace(/(\r\n|\n\r|\r|\n)/g, breakTag + '$1');
        }
        $(document).ready(async function() {
            // auto change menu every 15 seconds but for menu-slug 'ruang-asesmen' is 28 seconds
            let i = 1;
            var menu = $('.list-group-item');
            var menuLength = menu.length;
            // when change menu add active class
            menu.each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    i = $(this).index();
                    var triggerTime = $(this).data('slug') == 'ruang-asesmen' ? 28000 : 15000;
                    // Hapus kelas active pada menu yang lain
                    menu.removeClass('active');
                    $(this).addClass('active');
                    $.ajax({
                        url: '{{ route('menu') }}',
                        type: 'GET',
                        data: {
                            // get data-slug
                            slug: menu.eq(i).data('slug')
                        },
                        success: function(response) {
                            var id = response.id;
                            var title_desc = response.title_desc;
                            var body_desc = response.body_desc;
                            var video = response.video;

                            $('.title_desc').text(title_desc);
                            $('.body_desc').html(nl2br(body_desc));

                            // Hapus dan tambahkan kembali kelas animasi pada video

                            // Set ulang sumber video
                            $('.video').attr('src',
                                `{{ asset('storage/${video}') }}`);

                            if (response.is_desc == 1) {
                                $('.judul').show();
                                $('.asesmen').hide();
                                $('.mushola').hide();
                            } else {
                                if (response.menu_slug == 'mushala') {
                                    $('.judul').hide();
                                    $('.asesmen').hide();
                                    $('.mushola').show();
                                } else if (response.menu_slug == 'ruang-asesmen') {
                                    $('.judul').hide();
                                    $('.asesmen').show();
                                    $('.mushola').hide();
                                    const asesmenContent = document.getElementById(
                                        'asesmen-content');
                                    let currentPage = 1;
                                    const totalPages = {{ $asesmen->lastPage() }};

                                    function loadPage(page) {
                                        fetch(
                                                `{{ url('floor/' . $floor->id) }}?page=${page}`
                                            )
                                            .then(response => response.text())
                                            .then(html => {
                                                const parser = new DOMParser();
                                                const doc = parser
                                                    .parseFromString(html,
                                                        'text/html');
                                                const newContent = doc
                                                    .querySelector(
                                                        '#asesmen-content')
                                                    .innerHTML;
                                                $('.asesmen').removeClass(
                                                        'slideInRight')
                                                    .addClass('slideInRight');
                                                // add fade out animation
                                                $('.asesmen').css('animation',
                                                    'none');
                                                setTimeout(function() {
                                                    $('.asesmen').css(
                                                        'animation',
                                                        '');
                                                }, 1);
                                                asesmenContent.innerHTML =
                                                    newContent;

                                            });
                                    }

                                    setInterval(function() {
                                        currentPage = (currentPage %
                                            totalPages) + 1;
                                        if (currentPage == 1) {
                                            clearInterval();
                                        } else {
                                            loadPage(currentPage);
                                        }
                                    }, 7000);
                                }
                            }
                            $('.video').removeClass('fadeIn').addClass('fadeIn');
                            $('.judul, .mushola').removeClass(
                                    'slideInRight')
                                .addClass(
                                    'slideInRight');
                            $('.judul, .mushola, .video').css('animation',
                                'none');
                            setTimeout(function() {
                                $('.judul, .mushola, .video').css(
                                    'animation',
                                    '');
                            }, 1);
                        }
                    });

                    i = i + 1;
                    if (i >= menuLength) {
                        i = 1;
                    }
                    setTimeout(function() {
                        menu.eq(i).trigger('click');
                    }, triggerTime);
                });
            });

            // Set current day
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                'September',
                'Oktober', 'November', 'Desember'
            ];
            var d = new Date();
            var day = days[d.getDay()];
            var date = d.getDate();
            var month = months[d.getMonth()];
            var year = d.getFullYear();
            $('#current-day').text(day + ', ' + date + ' ' + month + ' ' + year);
            let timings;
            // Fetch prayer times
            const apiUrl = 'http://api.aladhan.com/v1/timingsByCity?city=Jakarta&country=Indonesia&method=2';
            await fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    timings = data.data.timings;
                    const jadwalShalatDiv = document.getElementById('jadwal-shalat');
                    jadwalShalatDiv.innerHTML = `
                    <div class ="row row-shalat">
                    <div class="col-12 subuh text-center">
                    <h4 class="mt-5 nama-shalat">Shalat Subuh</h4>
                    <p class="jam-shalat">${timings.Fajr}</p>
                    </div>
                    <div class="col-12 zuhur text-center">
                    <h4 class="mt-5 nama-shalat">Shalat Dzuhur</h4>
                    <p class="jam-shalat">${timings.Dhuhr}</p>
                    </div>
                    <div class="col-12 ashar text-center">
                    <h4 class="mt-5 nama-shalat">Shalat Ashar</h4>
                    <p class="jam-shalat">${timings.Asr}</p>
                    </div>
                    <div class="col-12 magrib text-center">
                    <h4 class="mt-5 nama-shalat">Shalat Maghrib</h4>
                    <p class="jam-shalat">${timings.Maghrib}</p>
                    </div>
                    <div class="col-12 isya text-center">
                    <h4 class="mt-5 nama-shalat">Shalat Isya</h4>
                    <p class="jam-shalat">${timings.Isha}</p>
                    </div>
                    </div>
                `;
                })
                .catch((error) => {
                    // alert
                    alert('Failed to fetch prayer times, initiate reload');
                    // reload page
                    location.reload();
                });
        });
    </script>
</body>

</html>
