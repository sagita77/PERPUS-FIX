<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling form dengan latar belakang putih dan border */
        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Warna teks hijau untuk pesan sukses */
        .success-message {
            color: green;
        }
        /* Warna teks merah untuk pesan error */
        .error-message {
            color: red;
        }
    </style>
</head>
<body class="bg-light">

    <div class="form-container mt-5">
        <h2 class="text-center">Form Registrasi</h2>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username (min 10 karakter):</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                @error('username') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (min 10 karakter):</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (@gmail.com):</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                @error('nama_lengkap') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="no_tlp" class="form-label">No Telepon (angka):</label>
                <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') }}">
                @error('no_tlp') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok (angka):</label>
                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" oninput="formatRupiah(this)" value="{{ old('gaji_pokok') }}">
                @error('gaji_pokok') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="mb-3">
                <label for="pinjaman" class="form-label">Pinjaman (Rp):</label>
                <input type="text" class="form-control" id="pinjaman" value="{{ old('pinjaman') }}" oninput="formatRupiah(this)" placeholder="Masukkan jumlah pinjaman">
                <input type="hidden" name="pinjaman" id="pinjaman-hidden">
                @error('pinjaman') <p class="error-message">{{ $message }}</p> @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- Menambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- JavaScript untuk Format Rupiah -->
    <script>
        function formatRupiah(element) {
            // let value = element.value.replace(/\D/g, ""); // Hanya ambil angka
            // let formatted = new Intl.NumberFormat("id-ID", {
            //     style: "currency",
            //     currency: "IDR"
            // }).format(value);

            // element.value = formatted; // Menampilkan format Rupiah
            
            // Menyimpan nilai angka ke input hidden

            let value = element.value.replace(/[^0-9]/g, '');
            // Memformat angka dengan pemisah titik untuk ribuan
            if (value) {
                value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
            // Mengupdate nilai input dengan format currency
            element.value = value;
            
        }
    </script>

</body>
</html>
