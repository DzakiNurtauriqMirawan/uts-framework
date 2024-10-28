@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="container py-4">
        <h2 class="mb-4">Pesan Masuk</h2>
        
        @if(isset($messages) && count($messages) > 0)
            @foreach($messages as $message)
                <div class="card mb-3">
                    <div class="card-header bg-dark text-white">
                        Pesan dari Pengguna
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Feedback dari {{ $message->nama }}</h5>
                        <p class="card-text">{{ $message->pesan }}</p>
                        <div class="text-muted">
                            <small>
                                Email: {{ $message->email }}<br>
                                Dikirim pada: {{ $message->created_at->format('d M Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info">
                Belum ada pesan masuk.
            </div>
        @endif
    </div>
</div>

<style>
    .content-wrapper {
        min-height: calc(100vh - 60px); /* Adjust based on your header height */
        padding: 20px;
    }
    
    .card {
        max-width: 50rem;
        margin: 0 auto;
    }
    
    .card-title {
        margin-bottom: 15px;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }
</style>
@endsection