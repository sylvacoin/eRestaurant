<?php

if ( !defined( 'BASEPATH' ) ) {
    exit( 'Direct script access not allowed' );
}

function form_months_dropdown( $data, $selected = NULL, $extra = NULL, $is_short = FALSE, $default = NULL )
{
    $months = array(0=> $default, 1 => 'January', 'February', 'March', 'April',
	'May', 'June', 'July', 'August',
	'September', 'October', 'November',
	'December'
    );
  
    $short_months = array(0=> $default, 1 => 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov','Dec');
    
    if ( $is_short == TRUE ){
	return form_dropdown( $data, $short_months, $selected, $extra );
    }else{
	return form_dropdown( $data, $months, $selected, $extra );
    }
}

function form_custom_date_dropdown( $data, $rmin, $rmax, $selected = NULL, $extra = NULL, $default = NULL )
{
    $numbers = range( $rmin, $rmax );
    $options[ 0 ] = $default;
    foreach ( $numbers as $index => $value )
    {
	$options[ $value ] = $value;
    }
    return form_dropdown( $data, $options, $selected, $extra );
}

function form_custom_range_dropdown( $data, $rmin, $rmax, $step = 1, $selected = NULL, $extra = NULL, $default = NULL )
{
    $numbers = range( $rmin, $rmax, $step );
    $options[ 0 ] = $default;
    foreach ( $numbers as $index => $value )
    {
	$options[ $value ] = $value;
    }
    return form_dropdown( $data, $options, $selected, $extra );
}


function form_custom_gender_dropdown( $data, $selected = NULL, $extra = NULL )
{
    $options = ['' => 'Select Gender', 'Male' => 'Male', 'Female' => 'Female'];
    return form_dropdown( $data, $options, $selected, $extra );
}

function format_days( $days , $shorten = false, $future = false)
{
    if ( $days == 0 ) {
	$when = $future == true ? 'today' : 'less than a day'; 
	return $when;
    } else if ( $days >= 7 && $days < 31 ) {
	$newDay = floor( $days / 7 );
	$rem = $days % 7;
	if ( $shorten == true ):
	    return $newDay . ' ' . ($newDay > 1 ? 'weeks' : 'week');
	else:
	    return $newDay . ' ' . ($newDay > 1 ? 'weeks' : 'week') . ( $rem > 1 ? ' and ' . $rem . ' days' : (($rem == 0) ? '' : ' and ' . $rem . ' day'));
	endif;
    } else if ( $days >= 31 ) {
	$newMonth = floor( $days / 31 );
	$remDays = floor( ( $days % 31 ) / 7 );
	$rem = floor( $days % 31 ) % 7;
	if ( $shorten == true ):
	    return $newMonth . ' ' . ($newMonth > 1 ? 'Months' : 'Month');
	else:
	    return $newMonth . ' ' . ($newMonth > 1 ? 'Months' : 'Month')
	    . ( $remDays > 1 ? ' and ' . $remDays . ' Weeks' : (($remDays == 0) ? '' : ' and ' . $remDays . ' Week'))
	    . ( $rem > 1 ? ' and ' . $rem . ' days' : (($rem == 0) ? '' : ' and ' . $rem . ' day'));
	endif;
    } else {
	return ( $days > 1 ? $days . ' days' : (($days == 0) ? '' : $days . ' day'));
    }
}


function get_rating_stars( $num_of_stars )
{
    $stars = '';
    if ( is_numeric($num_of_stars) && $num_of_stars > 0 )
    {
	for( $i = 0; $i < 5; $i++ )
	{
	    if ( $num_of_stars > $i ){
		$stars .= '<i class="fa fa-star w3-text-yellow"></i>';
	    }else{
		$stars .= '<i class="fa fa-star-o w3-text-yellow"></i>';
	    }
	}
    }else{
	$stars = '<i class="fa fa-star-o w3-text-yellow"></i>';
    }
    
    return $stars;
}

function init_js_imgUploadPreview(){
?>
<script type="text/javascript">
    function readURL ( input, output = 'preview') {
	
        var reader = new FileReader();
	
        reader.onload = function (e) {
            var error = '', width, height;

            var max_size = '10000';
            var max_width = '6000';
            var max_height = '6000';

            if (input.files && input.files[0]) {


                var imgobj = new Image();
                imgobj.src = window.URL.createObjectURL(input.files[0]);
                imgobj.onload = function ()
                {
                    width = imgobj.naturalWidth;
                    height = imgobj.naturalHeight;
                    var size = Math.floor(input.files[0].size / 1024);

                    if (size > max_size)
                    {
                        error = 'maximum image size exceeded.';
                    }

                    if (width > max_width || height > max_height)
                    {
                        alert('Maximum width or height exceeded for image.');
                        return false;
                    }

                    if (error.length == 0)
                    {
                        document.getElementById(output).src = e.target.result;
                    } else {
                        alert(error);
                    }
                    window.URL.revokeObjectURL(imgobj.src);
                }

            }
        };

        reader.readAsDataURL(input.files[0]);
        return false;
    };
    
</script>
<?php
}