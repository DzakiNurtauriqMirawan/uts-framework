<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        /* Navbar specific styles */
        .navbar {
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.25rem;
            padding: 0.5rem 1rem;
        }

        .nav-link {
            padding: 0.5rem 1rem !important;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .nav-link i {
            font-size: 1.1rem;
            width: 1.5rem;
            text-align: center;
        }

        .nav-link.active {
            font-weight: 600;
            color: #0d6efd !important;
            background-color: rgba(13, 110, 253, 0.1);
            border-radius: 0.375rem;
        }

        .logout-btn {
            padding: 0.5rem 1rem;
            color: #dc3545;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            color: #bb2d3b;
            background-color: rgba(220, 53, 69, 0.1);
            border-radius: 0.375rem;
        }

        /* Other existing styles */
        .table img {
            max-width: 100px;
            height: auto;
            object-fit: cover;
        }

        .alert {
            transition: opacity 0.5s ease-in-out;
        }

        .action-buttons {
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.journals.*') ? 'active' : '' }}" href="{{ route('admin.journals.index') }}">
                            <i class="bi bi-journal-text"></i>Jurnal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">
                            <i class="bi bi-calendar-event"></i>Event
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.message.*') ? 'active' : '' }}" href="{{ route('admin.message.index') }}">
                            <i class="bi bi-envelope"></i>Message
                        </a>
                    </li>
                </ul>
                <form action="{{ url('/welcome') }}" method="GET" class="d-flex">
                    @csrf
                    <button type="submit" class="btn logout-btn">
                        <i class="bi bi-box-arrow-right"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>