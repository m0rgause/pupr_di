<html>

<head>
    <title>Display Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            @yield('konten')
            <footer class="footer">
                <div class="text-slider">
                    <marquee scrollamount="10">Selamat datang di Balai Penilaian
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


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/assets/compiled/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        // auto change menu every 15 seconds
        var menu = $('.list-group-item');
        var i = 1;
        setInterval(() => {
            if (i == menu.length) {
                i = 1;
            }
            menu.eq(i).click();
            i++;
        }, 1000);

        // when change menu add active class
        menu.each(function() {
            $(this).on('click', function() {

                menu.removeClass('active');
                $(this).addClass('active');
            });
        });
    });

    $(document).ready(function() {
        var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ];
        var d = new Date();
        var day = days[d.getDay()];
        var date = d.getDate();
        var month = months[d.getMonth()];
        var year = d.getFullYear();
        $('#current-day').text(day + ', ' + date + ' ' + month + ' ' + year);
    });

    // ambil slug menu
    $(document).ready(function() {
        var menu = $('.list-group-item');
        menu.each(function() {
            $(this).on('click', function() {
                var slug = $(this).attr('href').replace('#', '');
                $.ajax({
                    url: '<?= base_url('getMenu') ?>',
                    type: 'GET',
                    success: function(data) {
                        $('.konten').html(data);
                    }
                });
            });
        });
    });
</script>

</html>
