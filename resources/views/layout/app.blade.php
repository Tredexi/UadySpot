<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uady Spot - @yield('titulo_pagina', 'Inicio')</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">


    @yield('styles')  
</head>
<body>
    <!-- ESTA ETIQUETA LLAMA AL NAVBAR QUE ESTA DENTRO DE COMPONENTS>NAVBAR.BLADE.PHP-->
    @include('components.navbar')

    <div class="container mt-4">
        @yield('content')
    </div>
    <!-- ESTA ETIQUETA LLAMA AL NAVBAR QUE ESTA DENTRO DE COMPONENTS>FOOTER.BLADE.PHP-->
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!--esto es para seleccionar los campus o esuelas en los eventos -->
    <script>
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
    </script>
</body>
</html>