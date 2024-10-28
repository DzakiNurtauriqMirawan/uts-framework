<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konseran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <style>
        /* Carousel Styles */
        .carousel-item img {
            height: 600px;
            object-fit: cover;
        }
        
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
        }

        /* Card Styles */
        .card {
            height: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
            margin-bottom: 30px;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center;
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
            line-height: 1.4;
            color: #333;
            text-align: center;
        }

        .card-text {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex-grow: 1;
            color: #666;
            text-align: center;
        }

        /* Section Styles */
        .section-title {
            margin: 3rem 0;
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

        /* Meta Information Styles */
        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            font-size: 0.9rem;
            color: #666;
        }

        .date {
            color: #666;
        }

        .category {
            background-color: #f8f9fa;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Event Meta Styles */
        .event-meta {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            color: #666;
        }

        .event-meta i {
            margin-right: 0.5rem;
        }

        /* Price Style */
        .price {
            font-weight: bold;
            color: #2c3e50;
            margin-top: 1rem;
            text-align: center;
        }

        /* Carousel Title Style */
        .carousel-caption h3 {
            color: yellow;
            text-decoration: underline;
            font-size: 1.8rem !important;
            font-weight: bold !important;
        }
    </style>
</head>
<body>
    @extends('layout.app')

    @section('content')
    <!-- Carousel Section -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/aset4.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Konser Peluncuran Album Perdana Hindia, "Menari Dengan Bayangan"</h3>
                    <p>Showcase bertajuk "Perayaan Bayangan" yang juga menampilkan sederet musisi bertalenta dalam satu panggung.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/aset2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Maternal Disaster Presents : Perunggu "Memorandum Showcase"</h3>
                    <p>2 Juli 2022, IFI Bandung, Jl. Purnawarman No.32 (5PM - 10PM)</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/aset6.png') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Kukira Lagu Bernadya, Ternyata Kisah Nyata</h3>
                    <p>Dalam submisi Open Column ini, Rinaldi Fitra Riandi menuliskan bagaimana lagu Bernadya bisa menjadi titik mula yang baik untuk kita memahami cara menghadapi patah hati, dan pentingnya cuti patah hati.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Journal Section -->
    <div class="container my-5">
        <h3 class="section-title">Latest Journals</h3>
        <div class="row g-4">
            @foreach($journals as $journal)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $journal->image) }}" 
                         class="card-img-top" 
                         alt="{{ $journal->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $journal->title }}</h5>
                        <p class="card-text">{{ Str::limit($journal->caption, 150) }}</p>
                        <div class="card-meta">
                            <span class="date">{{ \Carbon\Carbon::parse($journal->date)->format('d M Y') }}</span>
                            <span class="category">{{ $journal->category }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Event Section -->
    <div class="container my-5">
        <h3 class="section-title">Upcoming Events</h3>
        <div class="row g-4">
            @forelse($events as $event)
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="{{ asset('uploads/events/' . $event->image) }}" 
                         class="card-img-top" 
                         alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <div class="event-meta">
                            <i class="bi bi-calendar-event"></i>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}</span>
                        </div>
                        <div class="event-meta">
                            <i class="bi bi-geo-alt"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                        <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                        <p class="price">Mulai Dari Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                        <div class="d-flex justify-content-center">
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
    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>