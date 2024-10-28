@extends('layout.main')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Edit Jurnal</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.journals.update', $journal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="title" class="form-label required">Judul Jurnal</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    id="title" 
                                    name="title" 
                                    value="{{ old('title', $journal->title) }}"
                                    placeholder="Masukkan judul jurnal" 
                                    required
                                >
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label required">Kategori</label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                    <option value="" disabled>Pilih kategori</option>
                                    <option value="Music" {{ old('category', $journal->category) == 'Music' ? 'selected' : '' }}>Music</option>
                                    <option value="Column" {{ old('category', $journal->category) == 'Column' ? 'selected' : '' }}>Column</option>
                                    <option value="Education" {{ old('category', $journal->category) == 'Education' ? 'selected' : '' }}>Education</option>
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
                                    value="{{ old('date', $journal->date) }}"
                                    required
                                >
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="caption" class="form-