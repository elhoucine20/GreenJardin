<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">

    @yield('style')

</head>

<body>

    <x-navbarVisiteur />

    <!-- ========================================
         PAGE HEADER
         ======================================== -->
@hasSection('page-header')
    <section class="page-header">
        <div class="container">
            <h1>
                <i class="bi bi-@yield('icon', 'credit-card')"></i>
                @yield('title-h1')
            </h1>
            <p>@yield('description-p')</p>
        </div>
    </section>
@endif

    @yield('sections')

    <!-- ========================================
         FOOTER
         ======================================== -->
    <footer class="footer">
        <div class="container">
            <p>© 2026 GardenApp - All rights reserved</p>
        </div>
    </footer>

</body>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@yield('script')

</html>