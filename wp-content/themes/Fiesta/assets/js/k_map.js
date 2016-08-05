"use strict";
var CurrentMap;
var kmlObj=[];
var MED = new google.maps.LatLng(6.27018,-75.598095);
jQuery(document).ready(function(a) {
    a(".google-map").each(function() {
        function b(a) {
            function b() {
                i.setAnimation(null !== i.getAnimation() ? null : google.maps.Animation.BOUNCE)
            }
            var e, g = [{
                    stylers: [{
                        saturation: -100
                    }]
                }],
                h = {
                    zoom: parseInt(13),
                    center: MED,
                    scrollwheel: true,
                    draggable:true,
                    mapTypeId: google.maps.MapTypeId[d.mapType]
                };
            e = CurrentMap= new google.maps.Map(c[0], h);
            var i;
            if ("blackwhite" === d.mapStyle && e.setOptions({
                    styles: g
                }), "show" === d.marker) {
                var j = {
                    url: d.markerURL,
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(12, 50)
                };
                i = new f({
                    label: d.label,
                    position: a,
                    icon: j,
                    map: e
                }), google.maps.event.addListener(i, "click", b)
            }

            jQuery.each(d.Klayers,function(index,value){
                var layer = new google.maps.KmlLayer(value.url, {
                    preserveViewport: true,
                    suppressInfoWindows: false 
                });
                kmlObj[value.id]=layer;  
                if(value.active){
                    kmlObj[value.id].setMap(CurrentMap);  
                    jQuery('#'+value.id).addClass('active');
                }
            
                  // google.maps.event.addListener(kmlObj[value.id], 'click', function(kmlEvent) {
                  //   var text = kmlEvent.featureData.description;
                  //   showInContentWindow(text);
                  // });


            });
        }
        var c = a(this),
            d = window[c.attr("id")],
            e = function(a) {
                this.setValues(a), this.div = document.createElement("div"), this.div.className = "map-marker-label fadeIn animated"
            };
        e.prototype = a.extend(new google.maps.OverlayView, {
            onAdd: function() {
                this.getPanes().overlayImage.appendChild(this.div);
                var a = this;
                this.listeners = [google.maps.event.addListener(this, "position_changed", function() {
                    a.draw()
                }), google.maps.event.addListener(this, "text_changed", function() {
                    a.draw()
                }), google.maps.event.addListener(this, "zindex_changed", function() {
                    a.draw()
                })]
            },
            onRemove: function() {
                this.div.parentNode.removeChild(this.div);
                for (var a = 0, b = this.listeners.length; b > a; ++a) google.maps.event.removeListener(this.listeners[a])
            },
            draw: function() {
                var b, c, d = String(this.get("text")),
                    e = this.marker.icon.anchor,
                    f = this.getProjection().fromLatLngToDivPixel(this.get("position"));
                this.div.innerHTML = d, this.div.style.position = "relative", b = a("div.map-marker-label").outerHeight(), c = a("div.map-marker-label").outerWidth(), this.div.style.left = f.x - c / 2 + "px", this.div.style.top = f.y - e.y - b - 10 + "px"
            }
        });
        var f = function(a) {
            google.maps.Marker.apply(this, arguments), a.label && (this.MarkerLabel = new e({
                map: this.map,
                marker: this,
                text: a.label
            }), this.MarkerLabel.bindTo("position", this, "position"))
        };
        if (f.prototype = a.extend(new google.maps.Marker, {
                setMap: function() {
                    google.maps.Marker.prototype.setMap.apply(this, arguments), this.MarkerLabel && this.MarkerLabel.setMap.apply(this.MarkerLabel, arguments)
                }
            }), void 0 !== d.address) {
            var g = new google.maps.Geocoder;
            g.geocode({
                address: d.address
            }, function(a, c) {
                c === google.maps.GeocoderStatus.OK ? b(a[0].geometry.location) : alert("Geocode was not successful for the following reason: " + c)
            })
        } else void 0 !== d.lat && void 0 !== d.lng && b(new google.maps.LatLng(d.lat, d.lng))
    })
    
    a('.kml-switch').on('click',function(){
        var id=a(this).attr('id');
        if(a(this).hasClass('active')){
            a(this).removeClass('active');
            kmlObj[id].setMap();
        }else{
            a(this).addClass('active');
            kmlObj[id].setMap(CurrentMap);
        }
    });

    a('.kml-switch').on('mouseenter',function(){
        var caption=a(this).data('caption');
        a('.map-caption').addClass('active').html(caption);
    }).on('mouseleave',function(){
        a('.map-caption').removeClass('active');
    });

    function showInContentWindow(text) {
        alert(text);
    }


});