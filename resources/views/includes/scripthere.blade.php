<script type="text/javascript">
        if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
        localCoord = position.coords;
        objLocalCoord = {
            lat: localCoord.latitude,
            lng: localCoord.longitude
        }

        let platform = new H.service.Platform({
            'apikey': window.hereApiKey
        });

        // Obtain the default map types from the platform object
        let defaultLayers = platform.createDefaultLayers();

        // Instantiate (and display) a map object:
        let map = new H.Map(
                document.getElementById('mapContainer'),
                defaultLayers.vector.normal.map,
                {
                    zoom: 13,
                    center: objLocalCoord,
                    pixelRatio: window.devicePixelRatio || 1
                });
            window.addEventListener('resize', () => map.getViewPort().resize());

        function init(latitude, longitude, radius) {
            clearSpace();
            fetchSpaces(latitude, longitude, radius)
            .then(function () {
                map.addObjects(spaces);
            });
        }

        if (window.action == 'browse') {
            map.addEventListener('dragend', function (ev) {
                let resultCoord = map.screenToGeo(
                    ev.currentPointer.viewportX,
                    ev.currentPointer.viewportY
                );
                init(resultCoord.lat, resultCoord.lng, 40);
            }, false);

            init(objLocalCoord.lat, objLocalCoord.lng, 40);
        }

        // Route to space
        let urlParams = new URLSearchParams(window.location.search);

        function calculateRouteAtoB (platform) {
            let router = platform.getRoutingService(),
                routeRequestParam = {
                    mode: 'fastest;car',
                    representation: 'display',
                    routeattributes : 'summary',
                    maneuverattributes: 'direction,action',
                    waypoint0: urlParams.get('from'),
                    waypoint1: urlParams.get('to')
                }

            router.calculateRoute(
                routeRequestParam,
                onSuccess,
                onError
            )
        }

        function onSuccess(result) {
            route = result.response.route[0];

            addRouteShapeToMap(route);
            addSummaryToPanel(route.summary);
        }

        function onError(error) {
            alert('Can\'t reach the remote server' + error);
        }

        function addRouteShapeToMap(route){
            let linestring = new H.geo.LineString(),
                routeShape = route.shape,
                startPoint, endPoint,
                polyline, routeline, svgStartMark, iconStart, startMarker, svgEndMark, iconEnd, endMarker;

            routeShape.forEach(function(point) {
                let parts = point.split(',');
                linestring.pushLatLngAlt(parts[0], parts[1]);
            });

            startPoint = route.waypoint[0].mappedPosition;
            endPoint = route.waypoint[1].mappedPosition;

            polyline = new H.map.Polyline(linestring, {
                style: {
                lineWidth: 5,
                strokeColor: 'rgba(0, 128, 255, 0.7)',
                lineTailCap: 'arrow-tail',
                lineHeadCap: 'arrow-head'
                }
            });

            routeline = new H.map.Polyline(linestring, {
                style: {
                    lineWidth: 5,
                    fillColor: 'white',
                    strokeColor: 'rgba(255, 255, 255, 1)',
                    lineDash: [0, 2],
                    lineTailCap: 'arrow-tail',
                    lineHeadCap: 'arrow-head'
                }
            });

            svgStartMark = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;" xml:space="preserve" width="512px" height="512px"><g><path d="M38.853,5.324L38.853,5.324c-7.098-7.098-18.607-7.098-25.706,0h0  C6.751,11.72,6.031,23.763,11.459,31L26,52l14.541-21C45.969,23.763,45.249,11.72,38.853,5.324z M26.177,24c-3.314,0-6-2.686-6-6  s2.686-6,6-6s6,2.686,6,6S29.491,24,26.177,24z" data-original="#1081E0" class="active-path" data-old_color="#1081E0" fill="#C12020"/></g> </svg>`;

            iconStart = new H.map.Icon(svgStartMark, {
                size: { h: 45, w: 45 }
            });

            startMarker = new H.map.Marker({
                lat: startPoint.latitude,
                lng: startPoint.longitude
            }, { icon: iconStart });

            svgEndMark = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;" xml:space="preserve"> <path style="fill:#1081E0;" d="M38.853,5.324L38.853,5.324c-7.098-7.098-18.607-7.098-25.706,0h0 C6.751,11.72,6.031,23.763,11.459,31L26,52l14.541-21C45.969,23.763,45.249,11.72,38.853,5.324z M26.177,24c-3.314,0-6-2.686-6-6 s2.686-6,6-6s6,2.686,6,6S29.491,24,26.177,24z"/></svg>`;

            iconEnd = new H.map.Icon(svgEndMark, {
                size: { h: 45, w: 45 }
            });

            endMarker = new H.map.Marker({
                lat: endPoint.latitude,
                lng: endPoint.longitude
            }, { icon: iconEnd });

            // Add the polyline to the map
            map.addObjects([polyline, routeline, startMarker, endMarker]);

            // And zoom to its bounding rectangle
            map.getViewModel().setLookAtData({
                bounds: polyline.getBoundingBox()
            });
        }

        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            rupiah     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function addSummaryToPanel(summary){
            const ongkir = (summary.distance/1000)*2000;
            const sumDiv = document.getElementById('summary');
            const markup = `
                <ul>
                    <li>Total Jarak: <strong>${summary.distance/1000}Km</strong></li>
                    <li>Biaya Ongkir : <strong>${formatRupiah(ongkir.toString(),'Rp.')}</strong></li>
                </ul>
                    `;
                    // <li>Waktu Tempuh: ${summary.travelTime.toMMSS()} (dalam situasi lalu lintas saat ini)</li>
            sumDiv.innerHTML = markup;
        }

        if (window.action == "direction") {
            calculateRouteAtoB(platform);

            Number.prototype.toMMSS = function () {
                return  Math.floor(this / 60)  +' minutes '+ (this % 60)  + ' seconds.';
            }
        }


    }, showError)

    var deny = false;
    function showError(error) {
        switch(error.code) {
          case error.PERMISSION_DENIED:
            this.deny = true;
            console.log(deny);
          // console.log("User denied the request for Geolocation.");
            break;
          case error.POSITION_UNAVAILABLE:
            // x.innerHTML = "Location information is unavailable."
            console.log("Location information is unavailable.");
            break;
          case error.TIMEOUT:
            // x.innerHTML = "The request to get user location timed out."
            console.log("The request to get user location timed out.");
            break;
          case error.UNKNOWN_ERROR:
            // x.innerHTML = "An unknown error occurred."
            console.log("An unknown error occurred.");
            break;
        }
    }

    // Open url direction
    objLocalCoord = null;
    function openDirection(lat, lng, id) {
        if (objLocalCoord != null) {
             const url_invoice = `http://127.0.0.1:8000/pdfview/${id}?from=${objLocalCoord.lat},${objLocalCoord.lng}&to=${lat},${lng}`+"_self";
            //  window.open(url_invoice);
            // console.log(outlet_phone);
            // return false;
        //   window.open(`/pdfview/${id}?from=${objLocalCoord.lat},${objLocalCoord.lng}&to=${lat},${lng}`, "_self");
          var accessToken = "960b48fb4ec9c1363d74c216f7377b1682ab9027";
          var params = {
              "long_url" : url_invoice
          };
          $.ajax({
              url: "https://api-ssl.bitly.com/v4/shorten",
              cache: false,
              dataType: "json",
              method: "POST",
              contentType: "application/json",
              beforeSend: function (xhr) {
                  xhr.setRequestHeader("Authorization", "Bearer " + accessToken);
              },
              data: JSON.stringify(params)
          }).done(function(data) {
              console.log(data.link);
              window.open( "https://api.whatsapp.com/send?phone=+" + "{{$data->outlet_phone}}" + "&text=" + "{{urlencode($data->product_description)}}" + "%0A%0A"  + "{{urlencode($data->note)}}" + "%0A%0A" + data.link);
          }).fail(function(data) {
              console.log(data);
          });
        }else if(deny==true){
            document.getElementById("dialog").style.display = "block";
            }
        }
  } else {
      console.error("Geolocation is not suppported by this browser!");
  }

  </script>
