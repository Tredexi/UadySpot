<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uady Spot - @yield('titulo_pagina', 'Inicio')</title>
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">


    <style>
        /* VARIABLES GLOBALES */
        :root {
            --uady-blue: #002e5f;   /* Azul UADY */
            --uady-gold: #CB9605;   /* Dorado UADY */
            --uady-white: #FFFFFF;   /* Blanco */
            --uady-black: #000000;   /* Negro */
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* NAVBAR PRINCIPAL */
        .navbar-uady {
            background-color: var(--uady-blue);
            border-bottom: 4px solid var(--uady-gold);
            padding: 15px 0;
        }

        .navbar-brand {
            color: var(--uady-white) !important;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .nav-link {
            color: var(--uady-white) !important;
            margin-right: 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--uady-gold) !important;
        }

        /* BRAND (Logo + Texto) */
        .brand-title {
            font-weight: 800;
            font-size: 1.1rem;
            letter-spacing: 1px;
            line-height: 1;
        }

        .brand-subtitle {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.65);
            letter-spacing: 0.5px;
        }

    

        /* LOGIN / REGISTRO */
        .login-link {
            transition: 0.3s;
            white-space: nowrap;
        }

        .login-link:hover {
            color: var(--uady-gold);
        }

        .register-link {
            background-color: var(--uady-gold);
            color: var(--uady-blue);
            padding: 5px 14px;
            border-radius: 20px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .register-link:hover {
            background-color: #e0a800;
            color: var(--uady-blue);
        }

        .dropdown-menu {
            border-radius: 12px;
            border: none;
            padding: 12px 0;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            animation: fadeIn 0.2s ease-in-out;
        }

        .dropdown-item {
            padding: 10px 20px;
            transition: 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(203,150,5,0.1);
            color: var(--uady-blue);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* FOOTER */
        footer {
            background-color: var(--uady-blue);
            color: var(--uady-white);
        }

        .footer-link {
            color: #adb5bd;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-link:hover {
            color: var(--uady-gold);
        }

        .footer-icon {
            color: #adb5bd;
            transition: 0.3s;
        }

        .footer-icon:hover {
            color: var(--uady-gold);
        }

        .footer-divider {
            border-left: 2px solid var(--uady-gold);
        }

        @media (max-width: 767px) {
            .footer-divider {
                border-left: none;
            }
        }
            /* Sombra para el carrusel */
        #uadyCarousel {
         box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        }

        /* Sombra para todas las tarjetas de noticias y eventos */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none !important; /* Quitamos el borde para que la sombra luzca mejor */
        }

        /* Efecto opcional: La sombra se intensifica al pasar el mouse */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        }


        /*ESTILOS PARA LA VISTA DE EVENTOS*/
         .border-theme-blue { border-color: #3b82f6; } /* border-blue-500 */
        .border-theme-pink { border-color: #ec4899; } /* border-pink-500 */
        .border-theme-green { border-color: #10b981; } /* border-emerald-500 */
        .bg-active-tag { background-color: #dbeafe; color: #1d4ed8; } /* bg-blue-100, text-blue-700 */
        
    </style>

    <link rel="icon" type="image/png" href="{{ asset('Imagenes/logo_uady.png') }}">


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