
<link href='../calendario/core/main.css' rel='stylesheet' />
<link href='../calendario/daygrid/main.css' rel='stylesheet' />

<script src='../calendario/core/main.js'></script>
<script src='../calendario/daygrid/main.js'></script>
<script src='../calendario/interaction/main.js'></script>

<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid', 'interaction' ],
    dateClick:function(info){
      alert("hola");
    }
  });
  calendar.setOption('locale','Es');
  calendar.render();
});

</script>

<div class="container cartag">
  <div id='calendar'></div>
</div>