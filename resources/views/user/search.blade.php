<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <style>
        .search-container {
            text-align: center;
            margin-top: 20%;
        }
        .input-container {
            border-bottom: 2px solid yellow;
            display: inline-block;
            width: 50%;
            margin-top: 20px;
            position: relative;
        }
        .search-input {
            background-color: transparent;
            border: none;
            color: black;
            width: 90%;
            font-size: 18px;
            outline: none;
        }
        .close-icon {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Icon "X" to close the search page -->
<svg id="close-btn" class="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="yellow" style="width: 30px; height: 30px;">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
</svg>

<form action="{{ route('search') }}" method="GET">
    <div class="search-container">
        <h1>Type a keyword to search.</h1>
        <div class="input-container">
            <input type="text" id="search-input" name="query" class="search-input" placeholder="Enter your keyword...">
        </div>
        <button type="submit" style="background-color: transparent; border: none;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="2" stroke="yellow" class="w-6 h-6" style="width: 30px; height: 30px; vertical-align: middle; margin-left: 10px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </button>
    </div>
</form>

<script>
    // Function to close the search page and return to previous page or homepage
    const closeBtn = document.getElementById('close-btn');

    closeBtn.addEventListener('click', function() {
        // Option 1: Go back to the previous page
        window.history.back();

        // Option 2: Redirect to homepage (uncomment if you prefer this)
        // window.location.href = "/";
    });
</script>

</body>
</html>
