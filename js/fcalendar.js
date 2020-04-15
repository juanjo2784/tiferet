document.addEventListener('DOMContentLoaded', function(){
var calendarEl = document.getElementById('calendar');
$("#loader").css("display","none");
$("#myDiv").css("display", "block");
var calendar = new FullCalendar.Calendar(calendarEl, {
plugins: [ 'dayGrid', 'interaction' ],
events: 'http://localhost/pages/event/eventos.php',
color: "#FF0F0",
textColor: "#FFFFFF",
eventClick:function(info){
    options = {weekday: 'short', month: 'large', day: 'numeric' };
    datetime = new Date(info.event.start);
    day = (datetime.getDate()<10)?"0"+datetime.getDate():datetime.getDate();
    month =((datetime.getMonth() + 1)<10)?"0"+(datetime.getMonth() + 1):datetime.getMonth() + 1; //month: 0-11
    year = datetime.getFullYear();
    date = day + "/" + month + "/" + year;
    hours = (datetime.getHours()<10)?"0"+datetime.getHours():datetime.getHours();
    minutes =(datetime.getMinutes()<10)?"0"+datetime.getMinutes():datetime.getMinutes();
    time = hours + ":" + minutes;
    $('#titulo').html(info.event.title);
    $('#fecha').html("Fecha: " + date + " - Hora: " + time + " hrs");
    if(info.event.extendedProps.img === null ){
        $('#cimg').hide();
    }else{
        $('#cimg').show();
        $('#imagen').attr("src",info.event.extendedProps.img);
    }
    if(info.event.extendedProps.audio === null){
        $('#caudio').hide();
    }else{
        $('#caudio').show();
        $('#audio').attr("src",info.event.extendedProps.audio);
    }

    $('#evento').modal();
    $('#boton').click(function(){

        if($('#boton').val() === "pausa"){
            $('#icono').html("play_arrow")
            $('#boton').val("play");
            document.getElementById('audio').pause();
        }else{
            $('#icono').html("pause")
            $('#boton').val("pausa");
            document.getElementById('audio').play();
        }
    })

    },
});
calendar.setOption('locale','Es');
calendar.render(); 
})