		$(document).ready(function() {
						$("#map").googleMap({
							zoom: 8, // Initial zoom level (optional)
							coords: [43.617308, -116.200589], // Map center (optional)
							type: "HYBRID" // Map type (optional)
						});
			
			
						$("#map").addMarker({
							title: 'CRobin', // Title
							coords: [43.553515, -116.126863], // GPS coords
							url: 'https://idahoannas.herokuapp.com/selected-user.php?username=CRobin&id=1', 
							// Link to redirect onclick (optional)
							id: 'marker1' // Unique ID for your marker
						});
						$("#map").addMarker({
							title: 'MsPeregrin', // Title
							coords: [43.601692, -116.159322], // GPS coords
							url: 'https://idahoannas.herokuapp.com/selected-user.php?username=MsPeregrin&id=11', 
							// Link to redirect onclick (optional)
							id: 'marker2' // Unique ID for your marker
						});
						$("#map").addMarker({
							title: 'FNightengale', // Title
							coords: [43.516205, -116.583171], // GPS coords
							url: 'https://idahoannas.herokuapp.com/selected-user.php?username=FNightengale&id=21', 
							// Link to redirect onclick (optional)
							id: 'marker3' // Unique ID for your marker
						});
					})