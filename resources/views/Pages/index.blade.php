@extends('app')
@section('content')

@include('components.toast')
<section class="pengaduan" id="pengaduan">
    <div class="section__container pengaduan__container">
        <div class="pengaduan__content">
            <h2 class="section__header">Pengaduan</h2>
            <p class="section__subheader" style="text-align: justify;">
                Jika Anda atau seseorang yang Anda kenal menjadi korban kekerasan seksual, jangan diam.
                Laporkan kejadian tersebut melalui form pengaduan online.
                Bersama, kita bisa menghentikan kekerasan dan melindungi hak asasi setiap individu.<br>Kami menyediakan
                layanan pengaduan yang bisa membantu Anda mendapatkan penanganan mental maupun hukum dan juga pengaduan
                langsung kepada <b>KOMNASHAM</b>.
            </p>
            <div class="pengaduan__flex">
                <div class="pengaduan__card">
                    <h4>25.210</h4>
                    <p>Kasus Kekerasan Seksual 2021</p>
                </div>
                <div class="pengaduan__card">
                    <h4>27.593</h4>
                    <p>Kasus Kekerasan Seksual 2022</p>
                </div>
                <div class="pengaduan__card">
                    <h4>29.883</h4>
                    <p>Kasus Kekerasan Seksual 2023</p>
                </div>
            </div>
            <a href="/form"> <button class="btn"> Form Pengaduan <i class="ri-arrow-right-line"></i> </button> </a>
        </div>
        <div class="pengaduan__image">
            <img src="Gambar/Pengaduan.webp" alt="pengaduan" />
        </div>
    </div>
</section>

<section class="konseling" id="konseling">
    <div class="section__container konseling">
        <h2 class="section__header">Ceritakan semua pada kami!</h2>
        <p class="section__subheader"><b>"Anda Tidak Sendirian, Kami Ada di Sini untuk Mendengarkan"</b><br>
            Kekerasan seksual adalah pengalaman yang berat. Anda tidak perlu menghadapinya sendirian karena kami menyediakan
            layanan konseling khusus untuk membantu Anda mengatasi trauma, mendapatkan kekuatan kembali, dan menjalani
            proses pemulihan dengan dukungan penuh.
        </p>
        <div class="konseling__grid">
            @foreach ($doctors as $doctor)
                <div class="konseling__card">
                    <div class="konseling__image">
                        <img src="{{ asset('Gambar/'. $doctor['image']) }}" alt="konseling" />
                    </div>
                    <div class="konseling__card__content">
                        <h7>{{ $doctor['name'] }}</h7>
                        <p>{{ $doctor['description'] }}</p>
                        <button class="konseling__btn" onclick="showCounselingModal('{{ asset('Gambar/'. $doctor['cv_image']) }}', '{{ $doctor->doctor->id }}')">
                            Detail<i class="ri-arrow-right-line"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
function showCounselingModal(imageUrl, id) {
    Swal.fire({
        showCloseButton: true,
        imageUrl: imageUrl,
        imageWidth: 500,
        imageHeight: 700,
        showConfirmButton: false,
        html: `
            <button class="button" id="konseling">Ajukan Konseling</button>
        `,
        background: "#e7b11c",
    });

    document.addEventListener("click", function(event) {
        if (event.target && event.target.id === "konseling") {
            window.location.href = `{{ url('/form/pengajuan-konseling/') }}/${id}`;
        }
    });
}
</script>

<section class="hukum" id="hukum">
    <div class="hukum__container">
        <h2 class="section__header">Pendampingan Hukum</h2>
        <p class="section__subheader">
            Pendampingan hukum, tidak hanya menawarkan solusi hukum, tetapi juga perlindungan dan empati. 
            Bersama-sama, kita perjuangkan hak Anda dan keadilan yang Anda layak dapatkan.
        </p>
        <div class="hukum__grid">
            @foreach ($advocats as $advocat)
            <div class="hukum__card">
                <img src="{{ asset('Gambar/' . $advocat->image) }}" alt="pendampingan hukum" />
                <div class="hukum__content">
                    <p>{{ $advocat->name }}</p><br>
                    <button class="hukum__btn" onclick="showModal('{{ asset('Gambar/' . $advocat->cv_image) }}', {{ $advocat->advocat->id }})">
                        Detail <i class="ri-arrow-right-line"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
function showModal(imageUrl, id) {
    Swal.fire({
        showCloseButton: true,
        imageUrl: imageUrl,
        imageWidth: 500,
        imageHeight: 700, 
        showConfirmButton: false,
        html: `<button class="button" id="hukum">Ajukan Pendampingan Hukum</button>`,
        background: "#e7b11c",
    });

    document.addEventListener("click", function(event) {
        if (event.target && event.target.id === "hukum") {
            window.location.href = `{{ url('/form/pengajuan-hukum/') }}/${id}`;
        }
    });
}
</script>


{{-- <section class="informasi" id="informasi">
    <div class="section__container informasi__container">
        <h2 class="section__header">Informasi</h2>
        <p class="section__subheader"><b>Mengetahui Lebih Banyak, Bertindak Lebih Baik!</b>
        </p>
        <div class="informasi__grid">
            <div class="informasi__card">
                <div class="informasi__img">
                    <img src="Gambar/artikel1.webp" alt="informasi" />
                </div>
                <div class="informasi__content">
                    <div class="informasi__author">
                        <img src="Gambar/profil1.webp" alt="author" />
                        <p>Oleh Brandon</p>
                    </div>
                    <h4><a href="https://www.halodoc.com/artikel/ketahui-bentuk-bentuk-kekerasan-seksual-yang-sering-terjadi"
                            type="text-white" target="_blank">Bentuk-bentuk kekerasan seksual yang sering terjadi di lingkungan.</a>
                    </h4>
                    <div class="informasi__footer">
                        <p>18 Apr 2024</p>
                        <span>
                            <a href="#"><i class="ri-share-fill"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="informasi__card">
                <div class="informasi__img">
                    <img src="Gambar/artikel2.webp" alt="informasi" />
                </div>
                <div class="informasi__content">
                    <div class="informasi__author">
                        <img src="Gambar/profil2.webp" alt="author" />
                        <p>Oleh Marrya Fee</p>
                    </div>
                    <h4><a
                            href="https://www.kompas.com/sains/read/2021/09/06/193000023/dampak-tanda-dan-pengobatan-pada-korban-pelecehan-seksual#:~:text=KOMPAS.com%20-%20Beberapa%20waktu%20terakhir%20berbagai"
                            type="text-white" target="_blank">Beberapa hal yang penting seperti gejala atau tanda, dampak psikologis
                            dan pengobatan bagi korban pelecehan seksual harus dipahami agar dapat menghindari dan cara
                            menyikapinya</a></h4>
                    <div class="informasi__footer">
                        <p>22 Jun 2024</p>
                        <span>
                            <a href="#"><i class="ri-share-fill"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="informasi__card">
                <div class="informasi__img">
                    <img src="Gambar/artikel3.webp" alt="informasi" />
                </div>
                <div class="informasi__content">
                    <div class="informasi__author">
                        <img src="Gambar/profil3.webp" alt="author" />
                        <p>Oleh Anina Putri</p>
                    </div>
                    <h4><a
                            href="https://www.kompas.com/sains/read/2021/09/05/170100023/bisa-timbulkan-trauma-begini-cara-bantu-korban-pelecehan-seksual#:~:text=Berikut%203%20cara%20yang%20bisa%20Anda"
                            type="text-white" target="_blank">Bisa Timbulkan Trauma, Begini Cara Bantu Korban Pelecehan Seksual</a>
                    </h4>
                    <div class="informasi__footer">
                        <p>05 Sep 2024</p>
                        <span>
                            <a href="#"><i class="ri-share-fill"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="informasi__card">
                <div class="informasi__img">
                    <img src="Gambar/artikel4.webp" alt="informasi" />
                </div>
                <div class="informasi__content">
                    <div class="informasi__author">
                        <img src="Gambar/profil4.webp" alt="author" />
                        <p>Oleh Riski Putra</p>
                    </div>
                    <h4><a
                            href="https://doktersehat.com/gaya-hidup/seksual/cara-menghadapi-trauma-pelecehan-seksual/#:~:text=Korban%20pelecehan%20dan%20kekerasan%20seksual%20mungkin"
                            type="text-white" target="_blank">Berbagai cara untuk menangani trauma akibat pelecehan seksual</a></h4>
                    <div class="informasi__footer">
                        <p>14 Des 2023</p>
                        <span>
                            <a href="#"><i class="ri-share-fill"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="informasi__card">
                <div class="informasi__img">
                    <img src="Gambar/artikel5.webp" alt="informasi" />
                </div>
                <div class="informasi__content">
                    <div class="informasi__author">
                        <img src="Gambar/profil5.webp" alt="author" />
                        <p>Oleh Fransiska Liu</p>
                    </div>
                    <h4><a
                            href="https://www.halodoc.com/artikel/hati-hati-ini-dampak-kekerasan-seksual-pada-psikis-dan-fisik-korban"
                            type="text-white" target="_blank">Kekerasan Seksual pada Psikis dan Fisik Korban yang membuat
                            trauma.</a></h4>
                    <div class="informasi__footer">
                        <p>10 Feb 2024</p>
                        <span>
                            <a href="#"><i class="ri-share-fill"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="informasi__btn">
        <a href="/informasi">

            <button class="btn">
                Lihat Semua Informasi <i class="ri-arrow-right-line"></i>
            </button>
        </a>
    </div>
    </div>
</section> --}}

<section class="hero">
    <div class="section__container hero__container">
        <p>SafeZone.</p>
    </div>
</section>

<section class="kegiatan" id="kegiatan">
    <div class="kegiatan__container">
        <h2 class="section__header">Agenda Kegiatan</h2>
        <p class="section__subheader">
            Ayo bersama melawan kekerasan seksual! Tingkatkan kesadaran dan ketahui lebih dalam tentang kekerasan seksual
            melalui agenda acara yang ada.
        </p>

        <div class="kegiatan__grid">
            @foreach ($events as $event)
            <button onclick='Swal.fire({
        showCloseButton: true,
        imageUrl: "Gambar/{{ $event->kegiatan_image }}",
        imageWidth: 500,
        imageHeight: 700,
        title: "{{ $event->kegiatan_location }}",
        showConfirmButton: false,

        background: "#e7b11c",
        });'>
                <div class="kegiatan__card">
                    <img src="Gambar/{{ $event->kegiatan_image }}" alt="kegiatan" />
                    <div class="kegiatan__content">
                        <h4>{{ $event->kegiatan_name }}</h4>
                        <p>{{ date('d F Y', strtotime($event->tanggal)) }}</p>
                    </div>
                </div>
            </button>
            @endforeach
        </div>
    </div>
</section>
@endsection