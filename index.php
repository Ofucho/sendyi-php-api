

<head>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyD5y2Y1zfyWCWDEPRLDBDYuRoJ8ReHYXwY"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
          
<body>
<div class="container">
  <div class="row">
    <form class="" method="post" action="main.php" id="messageSend">
      <div class="col-md-6">
        <div class="sendy-fields">
          
          <div class="row">
	     <p class="form-group form-row-wide address-field validate-required woocommerce-validated" id="location_field">
            <label for="Location" class="">Location <abbr class="required" title="required">*</abbr></label>
            <input type="text" class="input-text form-control" name="location" id="location" placeholder="Location" autocomplete="address-line1" data-geo="formatted_address" required>
         <input type="hidden" id="loc_lat" value="" />
   		 <input type="hidden" id="loc_long" value=""  />
	 </p>
          <p class="form-group">
            <input type="submit" class="btn btn-default" name="Submit" value="Submit" id="find">
          </p>
        </div>
      </div>
	</form>

</div>

<div id="response_error"></div>
</body>

<script>
    var searchInput = 'location';

   jQuery(document).ready(function(){
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['establishment'],
            componentRestrictions: {
             country: "KEN"
                        }
        });
		
		let lat ="";
		let longit = "";
		let locate = "";
		
	     google.maps.event.addListener(autocomplete, 'place_changed', function () {
			var near_place = autocomplete.getPlace();
			document.getElementById('loc_lat').value = near_place.geometry.location.lat();
			document.getElementById('loc_long').value = near_place.geometry.location.lng();
			
			lat = near_place.geometry.location.lat();
			longit = near_place.geometry.location.lng();
			locate = new google.maps.LatLng(lat,longit);
			
	
        });
			$(document).on('change', '#'+searchInput, function () {
    document.getElementById('loc_lat').value = '';
    document.getElementById('loc_long').value = '';

    document.getElementById('loc_lat').innerHTML = '';
    document.getElementById('loc_long').innerHTML = '';
});
		
          $('#messageSend').on('submit', function(e) {
		
			console.log(lat);
			console.log(locate);

            e.preventDefault();

           var that = $(this),url = that.attr('action'),method = that.attr('method'),data = {};
		   data['longitude'] = longit;
		   data['latitude'] = lat;
		   data['location'] = locate;
		   
              
           that.find('[name]').each(function(index, value){var that = $(this),name = that.attr('id'),value = that.val();data[name] = value;});

           $('#response_error').html('<center><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></center>');

           console.log(data);
            
          $.ajax({
                url: 'main.php',
                type: 'POST',
                data: data,
                success: function(results){

                $('#response_error').html('');
				
				console.log(results);

                //$('#messageSend').html(results);
                  
                //},
		  },

                error: function(data){
                     var errors = '<font color="red"><ul>';
                      for(datos in data.responseJSON){
                         errors += '<li>' + data.responseJSON[datos] + '</li>';
                        }
                        errors += '</ul></font>';
                        $('#response_error').show().html(errors);
                } 
            });

          });
        });

        </script>

