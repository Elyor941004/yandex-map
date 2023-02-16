<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <style>

        html{
            background: #000;
        }
        .wrap-map{
            width: 1200px;
            margin:30px auto;
            display: grid;
            grid-gap: 50px;
            grid-template-columns: 300px auto;
        }

        .form-map input{
            width: 100%;
            border: none;
            padding: 20px;
            font-size: 1em;
            outline: none;
            margin-bottom: 5px;
            background: #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            text-transform: capitalize;
            -webkit-transition: all 0.5s ;
            -moz-transition: all 0.5s ;
            -ms-transition: all 0.5s ;
            -o-transition: all 0.5s ;
            transition: all 0.5s ;
        }
        .form-map input:focus{
            background: #aaa;
        }
        .form-map .form__btn{
            color: #fff;
            background: rgb(63, 192, 46);
        }

        #map{
            width: 100%;
            height: 500px;
            border-radius: 10px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=50c2cf4e-d595-4d18-a363-b7aa10d3569c&lang=ru_RU" type="text/javascript">
    </script>
</head>
<body>
    <div class="wrap-map">
        <form action="" class="form-map">
            <input type="text" id="latitude" placeholder="latitude">
            <input type="text" id="longitude" placeholder="longitude">
        </form>
    <div id="map"></div>
</body>

<script>
    let mapOptions = {
        center:[41.314560, 69.269780],
        zoom:14
    }
    function init(){
        mapOptions = new ymaps.Map("map", {
            center: [41.314560, 69.269780],
            zoom: 14
        });
    }
    ymaps.ready(init);

    let map = new L.map('map' , mapOptions);

    let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);


    let marker = null;
    map.on('click', (event)=> {

        if(marker !== null){
            map.removeLayer(marker);
        }

        marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);

        document.getElementById('latitude').value = event.latlng.lat;
        document.getElementById('longitude').value = event.latlng.lng;

    })

</script>
</html>
