jQuery(document).ready(function($)
{

	var Map = 
	{
		map: false,
		markers: {
			data: [],
			db:   []
		},
		type: false,
		selected: [],

		initialize: function()
		{
			var interval  = setInterval(function()
			{
				if(google)
				{
					clearInterval(interval);
					this.configureMap();
				}
			}.bind(this), 1000);
		},

		configureMap: function()
		{
			var mapElement = document.getElementById('map');

			if(mapElement)
			{
				this.map = new google.maps.Map(mapElement, {
					center: { lat: 23.885942, lng: 45.079162 },
					zoom: Math.ceil(Math.log2($(window).width())) - 9,
					zoomControl: false,
					mapTypeControl: false,
					scaleControl: false,
					streetViewControl: false,
					rotateControl: false,
					fullscreenControl: false,
  					scrollwheel: false,
					styles: [  
					    {  
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#efefef"
					            }
					        ]
					    },
					    {  
					        "elementType":"geometry.fill",
					        "stylers":[  
					            {  
					                "saturation":-10
					            }
					        ]
					    },
					    {  
					        "elementType":"labels",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "elementType":"labels.icon",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#616161"
					            }
					        ]
					    },
					    {  
					        "elementType":"labels.text.stroke",
					        "stylers":[  
					            {  
					                "color":"#f5f5f5"
					            }
					        ]
					    },
					    {  
					        "featureType":"administrative",
					        "stylers":[  
					            {  
					                "color":"#000000"
					            }
					        ]
					    },
					    {  
					        "featureType":"administrative",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "featureType":"administrative.land_parcel",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "featureType":"administrative.land_parcel",
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#bdbdbd"
					            }
					        ]
					    },
					    {  
					        "featureType":"administrative.neighborhood",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "featureType":"poi",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "featureType":"poi",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#eeeeee"
					            }
					        ]
					    },
					    {  
					        "featureType":"poi",
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#757575"
					            }
					        ]
					    },
					    {  
					        "featureType":"poi.park",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#e5e5e5"
					            }
					        ]
					    },
					    {  
					        "featureType":"poi.park",
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#9e9e9e"
					            }
					        ]
					    },
					    {  
					        "featureType":"road",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "featureType":"road",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#ffffff"
					            }
					        ]
					    },
					    {  
					        "featureType":"road",
					        "elementType":"labels.icon",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "featureType":"road.arterial",
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#757575"
					            }
					        ]
					    },
					    {  
					        "featureType":"road.highway",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#dadada"
					            }
					        ]
					    },
					    {  
					        "featureType":"road.highway",
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#616161"
					            }
					        ]
					    },
					    {  
					        "featureType":"road.local",
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#9e9e9e"
					            }
					        ]
					    },
					    {  
					        "featureType":"transit",
					        "stylers":[  
					            {  
					                "visibility":"off"
					            }
					        ]
					    },
					    {  
					        "featureType":"transit.line",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#e5e5e5"
					            }
					        ]
					    },
					    {  
					        "featureType":"transit.station",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#eeeeee"
					            }
					        ]
					    },
					    {  
					        "featureType":"water",
					        "stylers":[  
					            {  
					                "color":"#ffffff"
					            },
					            {  
					                "weight":1.5
					            }
					        ]
					    },
					    {  
					        "featureType":"water",
					        "elementType":"geometry",
					        "stylers":[  
					            {  
					                "color":"#c9c9c9"
					            }
					        ]
					    },
					    {  
					        "featureType":"water",
					        "elementType":"geometry.fill",
					        "stylers":[  
					            {  
					                "lightness":100
					            }
					        ]
					    },
					    {  
					        "featureType":"water",
					        "elementType":"labels.text.fill",
					        "stylers":[  
					            {  
					                "color":"#9e9e9e"
					            }
					        ]
					    }
					]
				});
			
				this.configureMarkers();
			}
		},

		configureMarkers: function()
		{
			this.type = $('#map').attr('data-type');

			$.ajax({
		        url: ajaxurl+'?type='+this.type,
		        type: 'GET',
		        dataType: 'json',
		        data: {
		            action: 'map-markers'
		        },
		        success: function(data) {
		            this.markers.db = data;
		            this.setMarkers();
		        }.bind(this),
		    });
		},

		setMarkers: function()
		{
			_.forEach(this.markers.db, function(marker, key)
			{
				this.markers.data[key] = new google.maps.Marker({
		            position: new google.maps.LatLng(marker.latitude, marker.longitude),
		            icon: marker.original_marker,
		            map: this.map
		         });

				google.maps.event.addListener(this.markers.data[key], 'click', function() 
				{
					// Set Icon
					this.markers.data[key].setIcon(
						!this.markers.db[key].active ? this.markers.db[key].active_marker : this.markers.db[key].original_marker
					);

					// Toggle Active
					this.markers.db[key].active = !this.markers.db[key].active;

					// Marker Click Event
					this.markerClick(key);
				}.bind(this))
			}.bind(this));
		},

		markerClick: function(key)
		{
			var _this  = this;
			var active = this.markers.db[key].active;
			var name   = this.markers.db[key].name;

			if(this.type == 'team')
			{
				active ? this.selected.push(name) : _.pull(this.selected, name);

				if(this.selected.length == 0)
				{
					$('.team-box-wrapper').fadeIn();
				}
				else
				{
					$.each($('.team-box-wrapper'), function()
					{
						!_.includes(_this.selected, $(this).attr('data-team-member-location')) ?
							$(this).fadeOut() : $(this).fadeIn();
					})
				}
			}
		}
	}

	Map.initialize();

});