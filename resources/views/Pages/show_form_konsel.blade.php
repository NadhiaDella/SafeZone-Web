@extends('app')

@section('content')

<h1 class="p-2 text-center">Form Pengajuan Konseling</h1>
<div class="form-wrapper2">
    <form action="{{ route('store.konseling') }}" method="POST">
        @csrf
        <div class="profile">
            <img src="{{ asset('Gambar/'.$doctor->user->name) }}" alt="" class="profile-pic">
            <div>
                <h2>{{ $doctor->user->name }}</h2>
                <p class="role">{{ $doctor->title }}</p>
            </div>
        </div>
    
        <div class="info">
            <p>🕒 Satu sesi berlangsung 45-60 menit</p>
            <p>📄 Kamu diminta mengisi kuisioner screening sebelum sesi konseling</p>
            <p>🌐 Untuk konseling via voice call dan video call pastikan internet lancar saat konseling</p>
        </div>
    
        <div class="services">
            <div class="form-group">
                <label class="">Pilih Layanan Konseling</label>
                <!-- Hidden input to store the selected value -->
                <input type="hidden" name="via" id="via-input" required>

                <input type="hidden" name="doctor_id" value="{{ $doctor->user->id }}">
                
                <!-- Service buttons -->
                <button type="button" class="service-btn" data-value="Voice Call" onclick="selectService(this)">
                    <span>Voice Call</span>
                </button>
                <button type="button" class="service-btn" data-value="Video Call" onclick="selectService(this)">
                    <span>Video Call</span>
                </button>
                <button type="button" class="service-btn" data-value="Temu Offline" onclick="selectService(this)">
                    <span>Konsultasi Offline</span>
                </button>
            </div>
        </div>
    
        <div class="form-group">
            <label for="tanggal">Pilih Tanggal</label>
            <input type="date" name="tanggal" required>
        </div>
    
        <div class="form-group">
            <label for="waktu">Pilih Waktu</label>
            <input type="time" name="waktu" required>
        </div>
    
        <div class="button-wrapper">
            <button type="submit">Submit</button>
        </div>
    </form>

    <script>
        function selectService(button) {
            // Get the value from the clicked button's data attribute
            const selectedValue = button.getAttribute('data-value');
            
            // Update the hidden input with the selected value
            document.getElementById('via-input').value = selectedValue;
    
            // Optional: Add visual feedback to indicate which button was selected
            const allButtons = document.querySelectorAll('.service-btn');
            allButtons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');
        }
    </script>

</div>
@endsection