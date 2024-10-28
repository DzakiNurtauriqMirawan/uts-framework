<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konseran.Journal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <style>
        /* Card Styles */
        .card {
            margin-bottom: 30px;
            height: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            object-position: center;
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            color: #333;
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .card-text {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex-grow: 1;
            color: #666;
        }

        /* Meta Information Styles */
        .card-meta {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .card-meta .bi {
            margin-right: 0.5rem;
            color: #666;
        }

        /* Badge Styles */
        .badge {
            padding: 0.5em 1em;
            font-weight: 500;
        }

        /* Section Title Styles */
        .section-title {
            margin: 2rem 0 3rem;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #333;
        }

        /* Alert Styles */
        .alert-info {
            background-color: #f8f9fa;
            border-color: #e9ecef;
            color: #495057;
        }

        /* Pagination Styles */
        .pagination {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    @extends('layout.app')

    @section('content')
    <!-- EVENT SECTION -->
    <div class="container my-5">
        <h3 class="section-title">Event</h3>
        <div class="row g-4">
            @forelse($events as $event)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('uploads/events/' . $event->image) }}" 
                            class="card-img-top" 
                            alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <div class="card-meta">
                                <i class="bi bi-calendar-event"></i>
                                <span>{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span>
                            </div>
                            <div class="card-meta">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $event->location }}</span>
                            </div>
                            <p class="card-text">
                                {{ Str::limit($event->description, 100) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="badge {{ $event->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                                <a href="#" class="btn btn-outline-primary">Detail Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>
                        Belum ada event yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>

        @if($events->count() > 0)
            <div class="d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        @endif
    </div>
    @endsection
</body>
</html>