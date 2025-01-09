@extends('app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <h2>Selamat Datang di Layanan Pelaporan SafeZone</h2><br>
            <P>Terima kasih telah mengambil langkah berani untuk melaporkan tindakan kekerasan seksual. Kami memahami
                bahwa
                ini adalah keputusan yang tidak mudah, dan kami ingin Anda tahu bahwa Anda tidak sendirian. Di sini,
                setiap
                laporan akan ditangani dengan kerahasiaan penuh dan empati. Dengan melaporkan, Anda membantu menciptakan
                lingkungan yang lebih aman dan bebas dari kekerasan. Jika Anda merasa ragu atau butuh bantuan lebih
                lanjut
                sebelum mengisi form, tim kami siap mendampingi Anda. Mari bersama-sama kita hentikan kekerasan dan
                lindungi
                hak asasi setiap individu.</P><br>
            <h3>Form Pengaduan KOMNASHAM</h3><br>
            <p> Jika Anda ingin melaporkan kejadian ini langsung ke Komnas HAM, Anda juga dapat mengisi form pengaduan
                mereka melalui link :</p>
            <a style="color: blueviolet;" href="https://pengaduan.komnasham.go.id/id/" target="_blank">https://pengaduan.komnasham.go.id/id/</a>
        </div>
        <div class="col-8">
            <h3>Pelaporan SafeZone</h3><br>
            <p>Isi form di bawah ini untuk melaporkan kejadian kekerasan seksual. Kami menjamin bahwa setiap informasi
                yang
                Anda berikan akan diproses dengan kerahasiaan dan keseriusan penuh.</p><br>
            <div class="form-wrapper">
                <img src="{{asset('Gambar/headerform.png')}}" alt="SafeZone" class="form-image"><br>
                <form action="{{ route('store') }}" method="POST">
                    @csrf

                    @if (Auth::check())
                    <div class="form-group">
                        <label for="email">Alamat Email<span style="color: #c2553a;">*</span></label>
                        <input type="email" id="email" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="email">Alamat Email<span style="color: #c2553a;">*</span></label>
                        <input type="email" id="email" required>
                    </div>
                    @endif
                    
                    <div class="form-group">
                        <label for="bertindak_sebagai">Bertindak Sebagai<span style="color: #c2553a;">*</span></label>
                        <select id="bertindak_sebagai" name="bertindak_sebagai" required onchange="toggleNameField()">
                            <option disabled selected value="">Pilih peran Anda</option>
                            <option value="Korban">Korban</option>
                            <option value="Saksi">Saksi</option>
                        </select>
                    </div>

                    <div class="form-group" id="name-group" style="display: none;">
                        <label for="nama_korban">Nama Korban<span style="color: #c2553a;">*</span></label>
                        <input type="text" id="nama_korban" name="nama_korban">
                    </div>

                    <div class="form-group">
                        <label for="tgl_lapor">Tanggal Pelaporan<span style="color: #c2553a;">*</span></label>
                        <input type="date" id="tgl_lapor" name="tgl_lapor" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon<span style="color: #c2553a;">*</span></label>
                        <input type="number" id="no_telp" name="no_telp">
                    </div>

                    <div class="form-group">
                        <label for="no_telp_lain">Nomor Telepon Pihak Lain yang Dapat Dikonfirmasi<span style="color: #c2553a;">*</span></label>
                        <input type="number" id="no_telp_lain" name="no_telp_lain" required>
                    </div>

                    <div class="form-group">
                        <label for="domisili">Domisili<span style="color: #c2553a;">*</span></label>
                        <input type="text" id="domisili" name="domisili" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kekerasan_seksual">Jenis Kekerasan Seksual<span style="color: #c2553a;">*</span></label>
                        <input type="text" id="jenis_kekerasan_seksual" name="jenis_kekerasan_seksual" required>
                    </div>

                    <div class="form-group">
                        <label for="cerita_singkat_peristiwa">Cerita Singkat Persitiwa<span style="color: #c2553a;">*</span></label>
                        <input type="text" id="cerita_singkat_peristiwa" name="cerita_singkat_peristiwa" required>
                    </div>

                    <div class="form-group">
                        <label for="is_disabilitas">Memiliki Disabilitas<span style="color: #c2553a;">*</span></label>
                        <select id="is_disabilitas" name="is_disabilitas" required onchange="toggleNameField2()">
                            <option disabled selected value="">Apakah Anda Memiliki Disabilitas ?</option>
                            <option value=true>IYA</option>
                            <option value=false>TIDAK</option>
                        </select>
                    </div>

                    <div class="form-group" id="name-group2" style="display: none;">
                        <label for="desc_disabilitas">Jika IYA, Apa Jenis Disabilitas Yang Dimiliki</label>
                        <input type="text" id="desc_disabilitas" name="desc_disabilitas">
                    </div>

                    <div class="form-group">
                        <label for="nama_pelaku">Nama Terlapor atau Pelaku</label>
                        <input type="text" id="nama_pelaku" name="nama_pelaku">
                    </div>

                    <div class="form-group">
                        <label for="reasonComplainer_id">Alasan Pengaduan<span style="color: #c2553a;">*</span><br>(Silahkan Centang Salah Satu atau Lebih dari Pilihan Berikut)</label>
                        <div id="reasonComplainer_id" class="checkbox-card">
                            @foreach ($reasoncomplainer as $data)
                                <label><input type="checkbox" name="reasoncomplainer[]" value="{{ $data->id }}">{{ $data->name }}</label><br>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="whatuneed_id">Apa yang Butuhkan?<span style="color: #c2553a;">*</span><br>(Silahkan Centang Salah Satu atau Lebih dari Pilihan Berikut)</label>
                        <div id="whatuneed_id" class="checkbox-card">
                            @foreach ($whatuneed as $data)
                                <label><input type="checkbox" name="whatuneed[]" value="{{ $data->id }}">{{ $data->name }}</label><br>
                            @endforeach
                        </div>
                    </div>

                    <input type="hidden" value='1' name="form_type_id">

                    <div class="button-wrapper">
                        <button type="submit">Submit</button>
                    </div>
                </form>
                
                
            </div>

        </div>
        <!-- <div class="col-8">
            <h3>Pelaporan SafeZone</h3><br>
            <p>Isi form di bawah ini untuk melaporkan kejadian kekerasan seksual. Kami menjamin bahwa setiap informasi
                yang
                Anda berikan akan diproses dengan kerahasiaan dan keseriusan penuh.</p><br>
            <div class="iframe-container">
                <iframe class="responsive-iframe" src="https://docs.google.com/forms/d/e/1FAIpQLSewdqFiidVXXUgndoQHc5inksTtB_Kq_iV-qMcWQ6CSk_6S2Q/viewform?embedded=true" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe>

            </div>
        </div> -->
    </div>
</div>

<script>
    function toggleNameField() {
        const nameGroup = document.getElementById('name-group');
        const bertindakSebagai = document.getElementById('bertindak_sebagai').value;

        // Hide 'Nama' field if 'Saksi' or 'Keluarga' is selected
        if (bertindakSebagai === 'Saksi') {
            nameGroup.style.display = 'block';
        } else {
            nameGroup.style.display = 'none';
        }
    }

    // Call the function on page load to ensure proper visibility
    document.addEventListener('DOMContentLoaded', toggleNameField);
</script>

<script>
    function toggleNameField2() {
        const nameGroup2 = document.getElementById('name-group2');
        const isDisabilitas = document.getElementById('is_disabilitas').value;

        // Hide 'Nama' field if 'Saksi' or 'Keluarga' is selected
        if (isDisabilitas === 'true') {
            nameGroup2.style.display = 'block';
        } else {
            nameGroup2.style.display = 'none';
        }
    }

    // Call the function on page load to ensure proper visibility
    document.addEventListener('DOMContentLoaded', toggleNameField2);
</script>
@endsection