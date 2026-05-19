@extends('layout.app')
@section('titulo_pagina', 'Calendario')
@section('styles')

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css' rel='stylesheet' />

<link rel="stylesheet" href="{{ asset('css/calendario.css') }}">

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

@endsection

@section('content')

<div class="container py-5">

<h2 class="text-center fw-bold mb-4" style="color: var(--uady-blue);">
Calendario UADY
</h2>

<div class="card shadow-lg border-0 rounded-4 p-4">



<div id="calendar"></div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    let calendarEl = document.getElementById('calendar');

    let eventos = @json($eventos);

    let formattedEvents = eventos.map(e => ({
        title: e.titulo,
        start: e.fecha_calendario,
        url: `/eventos/${e.id}`,
    }));

    let calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale: 'es',

        height: 'auto',
        eventDisplay: 'block',

        events: formattedEvents,

        eventClick: function(info) {

            info.jsEvent.preventDefault();

            window.location.href = info.event.url;

        }

    });

    calendar.render();

});

</script>

</script>
</div>
</div>

@endsection