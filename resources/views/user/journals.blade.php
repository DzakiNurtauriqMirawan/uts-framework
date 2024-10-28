<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konseran.Journal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 30px;
            height: 100%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .card img {
            width: 100%;
            height: 250px; /* Fixed height */
            object-fit: cover; /* This will ensure the image covers the area without distortion */
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
            text-align: left;
        }

        .card-text {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex-grow: 1;
            text-align: justify;
        }

        .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            font-size: 0.9rem;
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

        h3.section-title {
            margin: 2rem 0 3rem;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            position: relative;
            padding-bottom: 1rem;
        }

        h3.section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: #333;
        }

        .journal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 1rem;
        }
    </style>
</head>
<body>
@extends('layout.app')

@section('content')
<div class="container my-5">
    <h3 class="section-title">Jurnal</h3>
    
    <div class="journal-grid">
        @foreach($journals as $journal)
            <div class="card">
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
        @endforeach
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>