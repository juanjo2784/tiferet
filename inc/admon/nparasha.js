function NParasha() {
    let item = ""
    fetch('https://www.hebcal.com/shabbat/?cfg=json&geonameid=281184&m=50&leyning=on')
    .then(res=>res.json())
    .then(data=> {
        console.log(data)    
    })
  }
  
  window.onload = NParasha;