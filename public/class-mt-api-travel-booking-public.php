<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.rbz.digital
 * @since      1.0.0
 *
 * @package    Mt_Api_Travel_Booking
 * @subpackage Mt_Api_Travel_Booking/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mt_Api_Travel_Booking
 * @subpackage Mt_Api_Travel_Booking/public
 * @author     RBZ Digital <rafael@rbz.digital>
 */
class Mt_Api_Travel_Booking_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mt-api-travel-booking-public.css', array(), rand(1, 99), 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mt-api-travel-booking-public.js', array( 'jquery' ), rand(1, 99), false );

		wp_enqueue_script( 'full-calendar', plugin_dir_url( __FILE__ ) . 'js/index.global.min.js', array( 'jquery' ), rand(1, 99), false );

	}

	public function display_search_form_shortcode() {
		ob_start();
		?>
		<form id="travel-booking-form" action="<?= esc_url( get_permalink(2) ) ?>" method="GET">
			<input type="hidden" name="destinations" value="">
			<input type="hidden" name="departure-location" value="value2">
			<input type="hidden" name="nights-at-destination" value="value3">
			<input type="hidden" name="departure-date" value="value4">
			<input type="hidden" name="passengers" value="value5">
			<button id="destinations"><?= __( 'Destinations', 'mt-api-travel-booking' ) ?></button>
			<button id="departure-location"><?= __( 'Departure Location', 'mt-api-travel-booking' ) ?></button>
			<button id="nights-at-destination"><?= __( 'Nights at Destination', 'mt-api-travel-booking' ) ?></button>
			<button id="departure-date"><?= __( 'Departure date', 'mt-api-travel-booking' ) ?></button>
			<button id="passengers"><?= __( 'Passengers', 'mt-api-travel-booking' ) ?></button>
			<button class="search"><?= __( 'Search', 'mt-api-travel-booking' ) ?></button>
		</form>
		
		<div class="menus">
			<div class="travel-booking-opt full" id="opt-destinations">
				<?php echo $this->get_destinations_family('destination'); ?>
			</div>
			<div class="travel-booking-opt" id="opt-departure-location">
				<?php echo $this->get_destinations_list('destination'); ?>
			</div>
			<div class="travel-booking-opt" id="opt-nights-at-destination">
				<input type="number" value="1" min="1" max="14">
				<input type="button" id="nights-at-destination-confirm" value="Confirm">
			</div>
			<div class="travel-booking-opt full" id="opt-departure-date"></div>
		</div>
	
		<?php
		$output_string = ob_get_contents();
		ob_end_clean();
		return $output_string;
	}

	public function get_destinations_family($type) {
		$output = '<ul>';
		$output .= '<li>Brasil<br><a href="#" destination-id="202">Fortaleza</a></li>';
		$output .= '</ul>';

		return $output;

        try {
            $wsdlUrl = 'http://webservices.solferias.com:81/gpwsPacote/?wsdl';
            $client = new SoapClient($wsdlUrl);
			
            $authentication = array(
                'idcliente' => '9445',
                'login' => 'wsdev',
                'password' => 'B60AAA6C48'
            );
			
            if ($type === 'destination') {
                $method = 'getZonaTuristicaFamiliaList';
            } elseif ($type === 'region') {
                return '';
            } else {
                return 'Error: Invalid type.';
            }
    
            $destinations = $client->__soapCall($method, array($authentication));

            //var_dump($destinations);
			//die();
			
            if (!is_array($destinations)) {
                return 'Error: Failed to fetch destinations.';
            }
			
            $output = '<ul>';
			$output .= '<li>Brasil<br><a>Fortaleza</a></li>';
            foreach ($destinations as $destination) {
				echo '<pre>';
				print_r($destination);
				echo '<pre>';
                //$output .= '<li>' . $destination->descricao . '</li>';
            }
            $output .= '</ul>';
    
            return $output;
        } catch (SoapFault $fault) {
            return 'Error: ' . $fault->getMessage();
        }
    }

	public function get_destinations_list($type) {
		$output = '<ul>';
		$output .= '<li><a href="#" departure-location-id="202">Lisboa</a></li>';
		$output .= '</ul>';

		return $output;
        try {
            $wsdlUrl = 'http://webservices.solferias.com:81/gpwsPacote/?wsdl';
            $client = new SoapClient($wsdlUrl);
			
            $authentication = array(
                'idcliente' => '9445',
                'login' => 'wsdev',
                'password' => 'B60AAA6C48'
            );
			
            if ($type === 'destination') {
                $method = 'getZonaTuristicaList';
            } elseif ($type === 'region') {
                return '';
            } else {
                return 'Error: Invalid type.';
            }
    
            $destinations = $client->__soapCall($method, array($authentication));

            //var_dump($destinations);
			//die();
			
            if (is_object($destinations)) {
                $destinations = get_object_vars($destinations);
            }
    
            $output = '<select id="destination" class="form-select" aria-label="Select Destination">';
            $output .= '<option selected disabled>Select Region</option>';
            foreach ($destinations as $destination) {
                if (is_object($destination)) {
                    $output .= '<option>' . $destination->descricao . '</option>';
                } elseif (is_array($destination)) {
                    foreach ($destination as $item) {
                        $output .= '<option>' . $item->descricao . '</option>';
                    }
                }
            }
            $output .= '</select>';
    
            return $output;
        } catch (SoapFault $fault) {
            return 'Error: ' . $fault->getMessage();
        }
    }

}
