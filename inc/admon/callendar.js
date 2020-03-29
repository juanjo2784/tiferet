let texto;
  document.addEventListener('DOMContentLoaded', function(){
  var calendarEl = document.getElementById('calendar');
  $("#loader").css("display","none");
  $("#myDiv").css("display", "block");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid', 'interaction' ],
    events: "http://localhost/inc/admon/eventos.php",
    
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
      if(info.event.extendedProps.img  === null){
        $('#img2').hide();
        $('#rfile').val("null");
      }else{
      $('#img2').show();
      $('#img2').attr("src",info.event.extendedProps.img);
      $('#rfile').val(info.event.extendedProps.img);
      }
      $('#backgroundColor2').val(info.event.backgroundColor); 
      $('#idevento').val(info.event.id);
      $('#idevento2').val(info.event.id);
      $('#upevento').modal();
    },
  });
  calendar.setOption('locale','Es');
  calendar.render(); 
})