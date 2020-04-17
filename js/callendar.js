  document.addEventListener('DOMContentLoaded', function(){
  var calendarEl = document.getElementById('calendar');
  $("#loader").css("display","none");
  $("#myDiv").css("display", "block");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid', 'interaction' ],
    events: "http://localhost/pages/admon/Eventos/eventos.php",
    
    dateClick:function(info){
      $('#nevento').modal();
      $('#fecha').val(info.dateStr);
    },
    eventClick:function(info){
      options = {weekday: 'short', month: 'short', day: 'numeric' };
      datetime = new Date(info.event.start);
      day = (datetime.getDate()<10)?"0"+datetime.getDate():datetime.getDate();
      month =((datetime.getMonth() + 1)<10)?"0"+(datetime.getMonth() + 1):datetime.getMonth() + 1; //month: 0-11
      year = datetime.getFullYear();
      date = year + "-" + month + "-" + day;
      hours = (datetime.getHours()<10)?"0"+datetime.getHours():datetime.getHours();
      minutes =(datetime.getMinutes()<10)?"0"+datetime.getMinutes():datetime.getMinutes();
      time = hours + ":" + minutes + ":00";
      $('#title2').val(info.event.title);
      $('#fecha2').val(date);
      $('#start2').val(time);
      $('#textColor2').val(info.event.textColor);
      if(info.event.extendedProps.img === null){
        $('#img3').hide();
        $('#limg').val("Agregar Imagen");
        $('#fimg').val(null);
      }else{
        console.log();
        $('#img3').show(info.event.extendedProps.img);
        $('#img3').attr("src",info.event.extendedProps.img);
        $('#limg').val("Cambiar Imagen");
        $('#rutaimg').val(info.event.extendedProps.img);
        $('#fimg').val(info.event.extendedProps.img);
      }
      $('#backgroundColor2').val(info.event.backgroundColor); 
      $('#idevento').val(info.event.id);
      $('#idevento2').val(info.event.id);
      if(info.event.extendedProps.audio === null){
        $('#eAudio').html('Agregar Audio');
        $('#fauido').val(null);
      }else{
        console.log(info.event.extendedProps.audio);
        $('#eAudio').html('Cambiar Audio');
        $('#rutaudio').val(info.event.extendedProps.audio);
        $('#faudio').val(info.event.extendedProps.audio);
      }
      $('#upevento').modal();
    },
  });
  calendar.setOption('locale','Es');
  calendar.render(); 
})