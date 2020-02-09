function NParasha() {
    let contenido = document.getElementById('#contenido')
    let item = ""
    fetch('https://www.hebcal.com/shabbat/?cfg=json&geonameid=281184&m=50&leyning=on')
    .then(res=>res.json())
    .then(data=> {
     for (let i = 1; i < data.items.length; i++){     
      if(data.items[i].category == "parashat"){
        item = data.items[i].title
        document.getElementById("contenido").innerHTML = item
        console.log(item)
      }

      }
    
    })
  }
  
  window.onload = NParasha;