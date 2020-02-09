function Parasha() {
    let contenido = document.getElementById('#contenido')
    let item = ""
    let titulo = ""
    let dia =""
    let dia2 = ""
    let mes = ""
    let hayom = ""
    let fecha2 =""
    fetch('https://www.hebcal.com/shabbat/?cfg=json&geonameid=281184&m=50&leyning=on')
    .then(res=>res.json())
    .then(data=> {
     for (let i = 1; i < data.items.length; i++){
      hayom = new Date(data.date)
      var options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById("hayom").innerHTML = hayom.toLocaleDateString("es-ES", options)

      if(data.items[i].category == "candles"){
        fecha2 = new Date(data.items[i].date)
        item = fecha2.toLocaleDateString("es-ES", options)  + "</br>" + data.items[i].title
        /*document.getElementById("contenido2").innerHTML = item
           var options = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };*/
       }
      
      if(data.items[i].category == "parashat"){
        fecha2 = new Date(data.items[i].date)
        titulo = data.items[i].title
        document.getElementById("contenido").innerHTML = titulo
        console.log(titulo)
      }

      }
    
    })
  }

  window.onload = Parasha;