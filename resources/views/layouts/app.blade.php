<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Soccermania</title>
            <link rel="icon" href="{{ asset('images/soccer.png') }}" type="image/x-icon">
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
        </head>
        <body class="bg-dark">
            <div class="container-wrapper">
                <header>
                    @include('header') 
                </header>
                <main>
                    @yield('content') 
                    @include('footer') 
                </main>
            </div>
        </body>
    </html>
