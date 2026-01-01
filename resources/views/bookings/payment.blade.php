@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-5rem)] bg-slate-50 flex items-center justify-center px-4 py-8 relative">
    
    <div id="copy-toast" class="fixed top-24 left-1/2 transform -translate-x-1/2 z-50 hidden transition-all duration-300 opacity-0 translate-y-[-20px]">
        <div class="bg-green-100 border border-green-200 text-green-700 px-6 py-3 rounded-xl shadow-xl flex items-center gap-3 animate-fade-in-down">
            <i class="fa-solid fa-check-circle text-lg"></i>
            <span class="font-bold text-sm">Nomor Rekening Disalin!</span>
        </div>
    </div>

    <div class="w-full max-w-lg">
        
        @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl shadow-sm text-sm flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-lg"></i>
            <div>
                <strong class="font-bold">Gagal Upload:</strong>
                <span class="text-xs">{{ $errors->first() }}</span>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            
            <div class="bg-slate-900 px-6 py-5 text-center text-white relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-slate-400 text-[10px] uppercase tracking-widest mb-0.5">Invoice #INV-{{ $booking->id }}</p>
                    <p class="text-3xl font-bold text-blue-400">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</p>
                </div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-blue-600 rounded-full mix-blend-multiply filter blur-2xl opacity-20"></div>
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-600 rounded-full mix-blend-multiply filter blur-2xl opacity-20"></div>
            </div>

            <div class="p-6">
                
                <div class="mb-5 border-b border-gray-100 pb-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-bold text-slate-900 text-base leading-tight">{{ $booking->nama_kost }}</h3>
                            <p class="text-slate-500 text-xs mt-0.5"><i class="fa-solid fa-location-dot mr-1 text-red-400"></i> {{ $booking->lokasi }}</p>
                        </div>
                        <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-1 rounded-full border border-blue-100">{{ $booking->durasi }} Bulan</span>
                    </div>

                    <div class="grid grid-cols-2 gap-y-2 gap-x-4 text-xs">
                        <div>
                            <span class="text-slate-400 text-[10px] uppercase block">Penyewa</span>
                            <span class="font-bold text-slate-800 truncate block">{{ $booking->nama_penyewa }}</span>
                        </div>
                        <div class="text-right">
                            <span class="text-slate-400 text-[10px] uppercase block">Check-in</span>
                            <span class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($booking->tanggal_mulai)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50/50 rounded-xl p-3 mb-5 border border-blue-100 flex items-center justify-between gap-3">
                    <div>
                        <p class="text-blue-900 font-bold text-[10px] mb-0.5">Transfer Bank BCA</p>
                        <p id="rek-number" class="text-base font-bold text-slate-800 font-mono tracking-wide">8900 1234 5678</p>
                        <p class="text-slate-500 text-[10px]">a.n PT SobatKos Indonesia</p>
                    </div>
                    <button type="button" onclick="copyRekening()" class="text-blue-600 hover:text-blue-700 hover:bg-blue-100 px-3 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1">
                        <i class="fa-regular fa-copy"></i> Salin
                    </button>
                </div>

                <form action="{{ route('bookings.process_payment', $booking->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-xs font-bold text-slate-700 mb-2">Upload Bukti Transfer</label>
                        
                        <div id="upload-area" 
                             class="relative w-full h-40 rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 hover:bg-white hover:border-blue-400 transition-all duration-300 cursor-pointer flex flex-col items-center justify-center group overflow-hidden"
                             onclick="triggerUpload()">
                            
                            <div id="state-idle" class="text-center px-4 transition-all duration-300">
                                <div class="w-12 h-12 bg-white rounded-full shadow-sm flex items-center justify-center mx-auto mb-3 group-hover:scale-110 group-hover:shadow-md transition-all duration-300 text-blue-500">
                                    <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                </div>
                                <p class="text-sm font-bold text-slate-700 group-hover:text-blue-600 transition-colors">Klik atau Drag Foto ke sini</p>
                                <p class="text-[10px] text-slate-400 mt-1">Format: JPG, PNG (Max 2MB)</p>
                            </div>

                            <div id="state-dragover" class="hidden flex-col items-center justify-center text-center px-4 pointer-events-none">
                                <i class="fa-solid fa-arrow-down text-4xl text-blue-500 mb-3 animate-bounce"></i>
                                <p class="text-sm font-bold text-blue-600">Lepaskan file di sini</p>
                            </div>

                            <div id="state-success" class="hidden absolute inset-0 w-full h-full bg-white flex-col items-center justify-center p-2 z-20">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-2 animate-bounce">
                                    <i class="fa-solid fa-check text-3xl text-green-500"></i>
                                </div>
                                
                                <p class="text-[10px] text-slate-400 uppercase tracking-wider mb-1 font-bold">File Terpilih</p>
                                <p id="file-name" class="font-bold text-slate-800 text-xs truncate max-w-[80%] mb-3">filename.jpg</p>

                                <button type="button" onclick="removeFile(event)" 
                                        class="absolute top-3 right-3 bg-red-50 text-red-500 w-8 h-8 rounded-full shadow-sm hover:bg-red-500 hover:text-white transition flex items-center justify-center"
                                        title="Hapus Foto">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <input id="file-upload" name="bukti_bayar" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg" onchange="handleFileSelect(this)">
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <a href="{{ route('bookings.create', $booking->kost_id) }}" 
                           class="flex-1 h-12 rounded-xl border-2 border-red-100 text-red-500 bg-white font-bold hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition shadow-sm transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </a>

                        <button type="submit" 
                                class="flex-1 h-12 rounded-xl bg-slate-900 text-white font-bold border-2 border-transparent hover:bg-blue-700 hover:shadow-blue-500/30 transition shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-sm">
                            Konfirmasi <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Copy Rekening Logic
    function copyRekening() {
        const rekNumber = document.getElementById('rek-number').innerText.replace(/\s/g, '');
        navigator.clipboard.writeText(rekNumber).then(() => { showToast(); });
    }
    function showToast() {
        const toast = document.getElementById('copy-toast');
        toast.classList.remove('hidden');
        setTimeout(() => { toast.classList.remove('opacity-0', 'translate-y-[-20px]'); }, 10);
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-[-20px]');
            setTimeout(() => { toast.classList.add('hidden'); }, 300);
        }, 3000);
    }

    // --- LOGIKA UPLOAD ---
    const fileInput = document.getElementById('file-upload');
    const uploadArea = document.getElementById('upload-area');
    
    // States
    const stateIdle = document.getElementById('state-idle');
    const stateDragover = document.getElementById('state-dragover');
    const stateSuccess = document.getElementById('state-success'); // Ganti Preview jadi Success
    const fileName = document.getElementById('file-name');

    function triggerUpload() { fileInput.click(); }

    function handleFileSelect(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            
            // Validasi tipe gambar
            if (!file.type.match('image.*')) {
                alert("Mohon upload file gambar (JPG/PNG)");
                return;
            }

            // Set Nama File
            fileName.textContent = file.name;

            // Ganti Tampilan ke Success State
            stateIdle.classList.add('hidden');
            stateDragover.classList.add('hidden');
            stateSuccess.classList.remove('hidden');
            stateSuccess.classList.add('flex');
            
            // Ubah Border jadi Hijau
            uploadArea.classList.remove('border-dashed', 'border-slate-300', 'bg-slate-50');
            uploadArea.classList.add('border-solid', 'border-green-200', 'bg-white');
            uploadArea.removeAttribute('onclick'); 
        }
    }

    function removeFile(event) {
        event.stopPropagation();
        fileInput.value = '';
        
        // Reset ke Idle
        stateSuccess.classList.add('hidden');
        stateSuccess.classList.remove('flex');
        stateDragover.classList.add('hidden');
        stateIdle.classList.remove('hidden');
        
        // Reset Styling
        uploadArea.classList.add('border-dashed', 'border-slate-300', 'bg-slate-50');
        uploadArea.classList.remove('border-solid', 'border-green-200', 'bg-white');
        uploadArea.setAttribute('onclick', 'triggerUpload()');
    }

    // --- DRAG & DROP LOGIC ---
    let dragCounter = 0;

    uploadArea.addEventListener('dragenter', (e) => {
        e.preventDefault();
        dragCounter++;
        if(!fileInput.value) {
            uploadArea.classList.add('border-blue-400', 'bg-blue-50');
            
            // Tampilkan State Dragover (Arrow + Bounce)
            stateIdle.classList.add('hidden');
            stateDragover.classList.remove('hidden');
            stateDragover.classList.add('flex');
        }
    });

    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dragCounter--;
        if (dragCounter === 0 && !fileInput.value) {
            uploadArea.classList.remove('border-blue-400', 'bg-blue-50');
            
            // Kembalikan ke Idle
            stateDragover.classList.add('hidden');
            stateDragover.classList.remove('flex');
            stateIdle.classList.remove('hidden');
        }
    });

    uploadArea.addEventListener('dragover', (e) => { e.preventDefault(); });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dragCounter = 0;
        uploadArea.classList.remove('border-blue-400', 'bg-blue-50');
        if (e.dataTransfer.files.length > 0) { 
            fileInput.files = e.dataTransfer.files; 
            handleFileSelect(fileInput); 
        }
    });
</script>
@endsection