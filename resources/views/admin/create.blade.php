@extends('layout.main')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Tambah Jurnal Baru</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.journals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="title" class="form-label required">Judul Jurnal</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    id="title" 
                                    name="title" 
                                    placeholder="Masukkan judul jurnal" 
                                    value="{{ old('title') }}"
                                    required
                                >
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label required">Kategori</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                    <option value="" disabled selected>Pilih kategori</option>
                                    <option value="Music" {{ old('category') == 'Music' ? 'selected' : '' }}>Music</option>
                                    <option value="Column" {{ old('category') == 'Column' ? 'selected' : '' }}>Column</option>
                                    <option value="Education" {{ old('category') == 'Education' ? 'selected' : '' }}>Education</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label required">Tanggal Publikasi</label>
                                <input 
                                    type="date" 
                                    class="form-control @error('date') is-invalid @enderror" 
                                    id="date" 
                                    name="date" 
                                    value="{{ old('date') }}"
                                    required
                                >
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="caption" class="form-label required">Caption Jurnal</label>
                                <textarea 
                                    class="form-control @error('caption') is-invalid @enderror" 
                                    id="caption" 
                                    name="caption" 
                                    rows="3" 
                                    placeholder="Masukkan deskripsi singkat jurnal (maksimal 150 karakter)"
                                    maxlength="150"
                                    required
                                >{{ old('caption') }}</textarea>
                                <div class="char-counter">
                                    <span id="charCount">0</span>/150 karakter
                                </div>
                                @error('caption')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label required">Gambar Jurnal</label>
                                <input 
                                    type="file" 
                                    class="form-control @error('image') is-invalid @enderror" 
                                    id="image" 
                                    name="image" 
                                    accept="image/*"
                                    required
                                >
                                <div class="form-text">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB.</div>
                                <img id="imagePreview" src="#" alt="Preview" class="preview-image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('admin.journals.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i>Simpan Jurnal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Character counter for caption
        document.getElementById('caption').addEventListener('input', function() {
            const maxLength = 150;
            const currentLength = this.value.length;
            document.getElementById('charCount').textContent = currentLength;
            
            if (currentLength > maxLength) {
                this.value = this.value.substring(0, maxLength);
            }
        });

        // Image preview
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('imagePreview');
            const file = e.target.files[0];
            
            if (file) {
                preview.style.display = 'block';
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        });
    </script>
@endsection
</body>
</html>

