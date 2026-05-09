<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uady Spot - @yield('titulo_pagina', 'Inicio')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/eventos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('Imagenes/logo_uady.png') }}">

    @yield('styles')
</head>

<body data-bs-theme="light">

    {{-- Navbar --}}
    @include('components.navbar')

    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('components.footer')

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- IMPORTANTE: Chart.js para el dashboard --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Scripts generales --}}
    <script>
        // 🌙 Tema claro/oscuro
        const btn = document.getElementById("themeBtn");

        function updateIcon() {
            if (!btn) return;
            const theme = document.body.getAttribute("data-bs-theme");
            btn.textContent = theme === "dark" ? "☀️" : "🌙";
        }

        function toggleTheme() {
            const body = document.body;
            const current = body.getAttribute("data-bs-theme");

            if (current === "dark") {
                body.setAttribute("data-bs-theme", "light");
                localStorage.setItem("theme", "light");
            } else {
                body.setAttribute("data-bs-theme", "dark");
                localStorage.setItem("theme", "dark");
            }

            updateIcon();
        }

        document.addEventListener("DOMContentLoaded", () => {
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme) {
                document.body.setAttribute("data-bs-theme", savedTheme);
            }
            updateIcon();
        });

        // FIX: solo ejecutar filtro si existe
        if (document.querySelector('.campus-select')) {

            const select = document.querySelector('.campus-select');
            const cards = document.querySelectorAll('.event-card');

            select.addEventListener('change', () => {
                const campus = select.value;

                cards.forEach(card => {
                    if (campus === 'all' || card.dataset.campus === campus) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

        }
    </script>

</body>
</html>