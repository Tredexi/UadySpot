@extends('layout.app')
@section('titulo_pagina', 'Calendario')

@section('content')

<div class="container py-5">

<h2 class="text-center fw-bold mb-4" style="color: var(--uady-blue);">
Calendario UADY
</h2>

<div class="card shadow-lg border-0 rounded-4 p-4">

<div class="d-flex justify-content-between align-items-center mb-3">

<button class="btn calendar-btn-uady" onclick="prevMonth()">
<i class="bi bi-arrow-left"></i>
</button>

<h4 id="monthYear" class="fw-bold mb-0"></h4>

<button class="btn calendar-btn-uady" onclick="nextMonth()">
<i class="bi bi-arrow-right"></i>
</button>

</div>

<table class="table calendar-table text-center">

<thead>
<tr>
<th>Do</th>
<th>Lu</th>
<th>Ma</th>
<th>Mi</th>
<th>Ju</th>
<th>Vi</th>
<th>Sa</th>
</tr>
</thead>

<tbody id="calendarBody"></tbody>

</table>

</div>

<!-- LEYENDA -->

<div class="row text-center mt-4">

<div class="col-md-4">
<span class="legend holiday"></span> Días inhábiles
</div>

<div class="col-md-4">
<span class="legend vacation"></span> Vacaciones
</div>

<div class="col-md-4">
<span class="legend platform"></span> Eventos UADY SPOT
</div>

</div>

</div>


<style>

.calendar-table td{
height:70px;
vertical-align:middle;
position:relative;
cursor:default;
}

.calendar-table td:hover{
background:#f5f7fa;
}

.event{
position:relative;
font-weight:600;
transition:background 0.2s ease;
}

/* puntito */

.event::after{
content:"";
position:absolute;
bottom:8px;
left:50%;
transform:translateX(-50%);
width:8px;
height:8px;
border-radius:50%;
}

/* colores del punto */

.holiday::after{
background:#d62828;
}

.vacation::after{
background:#d4a017;
}

.platform::after{
background:#1b3c74;
}

/* fondo suave al pasar el cursor */
.event.holiday:hover{
background:#f8caca;
}

.event.vacation:hover{
background:#ffe8a3;
}

.event.platform:hover{
background:#cfe0ff;
}

/* pequeño efecto moderno */

.event:hover{
transform:scale(1.05);
border-radius:6px;
}

/* DÍAS INHÁBILES */
.holiday{
background:#fde2e2;
border-color:#d62828;
}

.vacation{
background:#fff3cd;
border-color:#d4a017;
}

.platform{
background:#e3f2fd;
border-color:#1b3c74;
}

.today{
position:relative;
font-weight:700;
z-index:1;
}

.today::before{
content:"";
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
width:32px;
height:32px;
border-radius:50%;
background:#e5e7eb;
z-index:-1;
}

.legend{
display:inline-block;
width:15px;
height:15px;
border-radius:4px;
margin-right:5px;
}

.legend.holiday{background:#d62828;}
.legend.vacation{background:#d4a017;}
.legend.platform{background:#1b3c74;}

.tooltip-event{

position:absolute;
bottom:75px;
left:50%;
transform:translateX(-50%);
background:#333;
color:white;
padding:6px 10px;
border-radius:6px;
font-size:12px;
white-space:nowrap;
opacity:0;
pointer-events:none;
transition:0.2s;

}

td:hover .tooltip-event{
opacity:1;
}

.calendar-btn-uady{
background:var(--uady-blue);
color:white;
border:none;
padding:8px 14px;
transition:all 0.2s ease;
}

.calendar-btn-uady:hover{
background:var(--uady-gold);
color:var(--uady-blue);
}

.dots{
position:absolute;
bottom:6px;
left:50%;
transform:translateX(-50%);
display:flex;
gap:4px;
}

.dot{
width:7px;
height:7px;
border-radius:50%;
}

.dot.holiday{
background:#d62828;
}

.dot.vacation{
background:#d4a017;
}

.dot.platform{
background:#1b3c74;
}

</style>


<script>
const platformEvents = @json($events);

const months=[
"Enero","Febrero","Marzo","Abril","Mayo","Junio",
"Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"
];

const today = new Date();

let currentMonth = today.getMonth();
let currentYear = today.getFullYear();


const events={

"2026-01-01":{name:"Inicio de año",type:"holiday"},
"2026-01-02":{name:"Inicio de año",type:"holiday"},
"2026-01-03":{name:"Fallecimiento Felipe Carrillo Puerto",type:"holiday"},

"2026-02-02":{name:"Promulgación Constitución",type:"holiday"},
"2026-02-16":{name:"Carnaval",type:"holiday"},
"2026-02-17":{name:"Carnaval",type:"holiday"},
"2026-02-25":{name:"Fundación UADY",type:"holiday"},

"2026-03-03":{name:"Fallecimiento Cepeda Peraza",type:"holiday"},
"2026-03-16":{name:"Natalicio Benito Juárez",type:"holiday"},

"2026-04-21":{name:"Día del estudiante",type:"holiday"},
"2026-04-25":{name:"Día del empleado UADY",type:"holiday"},

"2026-05-01":{name:"Día del trabajo",type:"holiday"},
"2026-05-05":{name:"Batalla de Puebla",type:"holiday"},
"2026-05-10":{name:"Día de la madre",type:"holiday"},
"2026-05-15":{name:"Día del maestro",type:"holiday"},

"2026-09-15":{name:"Independencia México",type:"holiday"},
"2026-09-16":{name:"Independencia México",type:"holiday"},

"2026-10-12":{name:"Día de los pueblos originarios",type:"holiday"},

"2026-11-01":{name:"Todos los santos",type:"holiday"},
"2026-11-02":{name:"Fieles difuntos",type:"holiday"},
"2026-11-16":{name:"Revolución Mexicana",type:"holiday"},

};


const vacations=[
{start:"2026-03-30",end:"2026-04-10",name:"Vacaciones de Primavera"},
{start:"2026-07-16",end:"2026-08-05",name:"Vacaciones de Verano"},
{start:"2026-12-26",end:"2026-12-31",name:"Vacaciones de Invierno"}
];


function getEvents(date){

let dayEvents = [];

// eventos del calendario oficial
if(events[date]){
dayEvents.push(events[date]);
}

// vacaciones
for(let v of vacations){
if(date>=v.start && date<=v.end){
dayEvents.push({name:v.name,type:"vacation"});
}
}

// eventos UADY SPOT
for(let e of platformEvents){
if(e.calendar_date === date){
dayEvents.push({
name: e.title,
type: "platform"
});
}
}

return dayEvents;

}


function generateCalendar(){

const firstDay=new Date(currentYear,currentMonth,1).getDay();
const daysInMonth=new Date(currentYear,currentMonth+1,0).getDate();

document.getElementById("monthYear").innerText=
months[currentMonth]+" "+currentYear;

let calendar="";
let date=1;

for(let i=0;i<6;i++){

calendar+="<tr>";

for(let j=0;j<7;j++){

if(i===0 && j<firstDay){

calendar+="<td></td>";

}else if(date>daysInMonth){

break;

}else{

let fullDate=currentYear+"-"+String(currentMonth+1).padStart(2,"0")+"-"+String(date).padStart(2,"0");

let dayEvents = getEvents(fullDate);

let isToday = date === today.getDate() &&
currentMonth === today.getMonth() &&
currentYear === today.getFullYear();

if(dayEvents.length > 0){

let tooltipText = dayEvents.map(e => e.name).join("<br>");

let dots = dayEvents.map(e => `<span class="dot ${e.type}"></span>`).join("");

calendar+=`
<td class="${isToday ? 'today' : ''} event">
${date}
<div class="dots">${dots}</div>
<div class="tooltip-event">${tooltipText}</div>
</td>
`;

}else{

calendar+=`<td class="${isToday ? 'today' : ''}">${date}</td>`;

}

date++;

}

}

calendar+="</tr>";

}

document.getElementById("calendarBody").innerHTML=calendar;

}

function nextMonth(){
currentMonth++;
if(currentMonth>11){currentMonth=0;currentYear++;}
generateCalendar();
}

function prevMonth(){
currentMonth--;
if(currentMonth<0){currentMonth=11;currentYear--;}
generateCalendar();
}

generateCalendar();

</script>

@endsection