function NParasha() {
    let contenido = document.getElementById('#contenido')
    let item = ""
    fetch('https://www.hebcal.com/hebcal/?v=1&cfg=json&maj=on&min=on&mod=on&nx=on&year=now&month=x&ss=on&mf=on&c=on&geo=geoname&geonameid=281184&m=50&s=on&D=on&i=on&lg=h')
    .then(res=>res.json())
    .then(data=> {
     for (let i = 1; i < data.items.length; i++){     
      if(data.items[i].category == "parashat"){
        item = data.items[i].title
        document.getElementById("contenido").innerHTML = item
        console.log(data.items)
      }

      }
    
    })
  }
  
  window.onload = NParasha;