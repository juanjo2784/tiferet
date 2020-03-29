<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

let texto;
  document.addEventListener('DOMContentLoaded', function(){
  var calendarEl = document.getElementById('calendar');
  $("#loader").css("display","none");
  $("#myDiv").css("display", "block");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid', 'interaction' ],
    events: "http://localhost/inc/admon/eventos.php",
    
    dateClick:function(info){
      (async () => {
        const { value: formValues } = await Swal.fire({
          title: 'Agregar Evento',
          html:
            '<div class="form-group row">'+
              '<label for="title" class="col-4 col-form-label">Nombre</label><input type="text" class="form-control col-8 float-left" id="title" name="title"  placeholder="Nombre del Evento" value="Prueba">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="start" class="col-4 col-form-label">Inicia</label><input type="time" class="form-control col-8 float-left" id="start" name="inicio" value="17:00:00">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="textColor" class="col-4 col-form-label">Color-texto</label><input type="color" class="form-control col-2 float-left" id="textColor" name="textColor" value="#FFFFFF">'+
              '<label for="backgroundColor" class="col-4 col-form-label">Color-cinta</label><input type="color" class="form-control col-2 float-left" id="backgroundColor" name="backgroundColor" value="#6699CC">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="dir" class="col-4 col-form-label">Dirección</label><input type="text" class="form-control col-8 float-left" id="dir" name="dir" value="esto es Prueba">'+
            '</div></div>',
          focusConfirm: false,
          showCancelButton: true,
          confirmButtonText: 'Agregar Evento',
          confirmButtonColor: '#1cc88a',
          cancelButtonColor: '#3085d6',
          preConfirm: () => {
            let formData = new FormData();
            return axios.post('addEvento.php', {
              title:"'"+document.getElementById('title').value+"'",
              inicio:"'"+info.dateStr + " "+ document.getElementById('start').value+"'",
              color:"'"+document.getElementById('textColor').value+"'",
              fondo:"'"+document.getElementById('backgroundColor').value+"'",
              dir: "'"+document.getElementById('dir').value+"'",
              formData
            }).then(res => {
              console.log({res});
          }).catch(err => {
              console.error({err});
          });
          }
        })

        if (formValues) {
          Swal.fire(JSON.stringify(formValues))
        }

        })()
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
      (async () => {

        const { value: formValues } = await Swal.fire({
          title: 'Actualizar Evento',
          html:
          '<div class = "container">'+
            '<div class="form-group row">'+
              '<label for="title" class="col-4 col-form-label">Nombre</label><input type="text" class="form-control col-8 float-left" id="title" name="title" value="'+info.event.title+'">'+
            '</div>'+
            '<div class="form-group row">'+
            '<label for="date" class="col-4 col-form-label">Fecha</label><input type="date" class="form-control col-8 float-left" id="date" name="inicio" value="'+date+'">'+
              '<label for="start" class="col-4 col-form-label">Inicia</label><input type="time" class="form-control col-8 float-left" id="start" name="inicio" value="'+time+'">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="textColor" class="col-4 col-form-label">Color-texto</label><input type="color" class="form-control col-2 float-left" id="textColor" name="textColor" value="'+info.event.textColor+'">'+
              '<label for="backgroundColor" class="col-4 col-form-label">Color-cinta</label><input type="color" class="form-control col-2 float-left" id="backgroundColor" name="backgroundColor" value="'+info.event.backgroundColor+'">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="dir" class="col-4 col-form-label">Dirección</label><input type="text" class="form-control col-8 float-left" id="dir" value="'+info.event.extendedProps.dir+'">'+
              '<input type="hidden" class="form-control col-8 float-left" id="id" value="'+info.event.id+'">'+
            '</div>'+
          '</div>',
          focusConfirm: false,
          showCancelButton: true,
          confirmButtonText: 'Actualizar Evento',
          confirmButtonColor: '#1cc88a',
          cancelButtonColor: '#3085d6',
          cancelButtonText: 'Eliminar',

          preConfirm: () => {
            return  [
              this.title="'"+document.getElementById('title').value+"'",
              this.inicio="'"+document.getElementById('date').value + " "+ document.getElementById('start').value+"'",
              this.color="'"+document.getElementById('textColor').value+"'",
              this.fondo="'"+document.getElementById('backgroundColor').value+"'",
              this.dir="'"+document.getElementById('dir').value+"'",
              this.id=document.getElementById('id').value,
            ]
          }
        }).then((result)=>{
          id = document.getElementById('id').value;
          datos = result.value;
          if(result.value){
            axios.post('upEvento.php', { datos })
            Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'El evento se ha actualizado',
                  showConfirmButton: false,
                  timer: 1500,
                })
            .finally(function () {location.reload()})
          }else{
            if(result.dismiss == 'cancel'){
              Swal.fire({
                title: 'Eliminar Evento',
                text: "¿Estás seguro de eliminar el evento?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
              }).then((result) => {
                if (result.value) {
                  axios.post('delEvento.php', {id})
                  Swal.fire(
                    'Evento Borrado!',
                    'El Evento ha sido Borrado exitosamente.',
                    'success'
                  ).finally(function () {location.reload()})
                }
              })
            }
          }
        })

        })()

    }
  });
  calendar.setOption('locale','Es');
  calendar.render(); 
})