<?php
/**
 * Twenty Twenty-Five Child theme functions.
 *
 * @package TwentyTwentyFiveChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue the child theme stylesheet.
 *
 * The parent (Twenty Twenty-Five) is a block theme and loads its own styles
 * via theme.json, so we only need to enqueue the child's style.css.
 */
function twentytwentyfive_child_enqueue_styles() {
	wp_enqueue_style(
		'twentytwentyfive-child-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles' );

/**
 * Inject Person + ProfessionalService JSON-LD on the front page only.
 */
function dd_front_page_jsonld() {
	if ( ! is_front_page() ) {
		return;
	}

	$schema = [
		'@context' => 'https://schema.org',
		'@graph'   => [
			[
				'@type'       => 'Person',
				'@id'         => 'https://danieldeepak.com/#person',
				'name'        => 'Maria Daniel Deepak',
				'url'         => 'https://danieldeepak.com',
				'email'       => 'daniel@danieldeepak.com',
				'jobTitle'    => 'CRM & Automation Consultant — Spa and Wellness',
				'worksFor'    => [ '@id' => 'https://danieldeepak.com/#organization' ],
				'sameAs'      => [
					'https://www.linkedin.com/in/mariadanieldeepak/',
					'https://github.com/mariadanieldeepak',
					'https://x.com/mariaddeepak',
					'https://www.instagram.com/mariadanieldeepak/',
				],
			],
			[
				'@type'       => 'ProfessionalService',
				'@id'         => 'https://danieldeepak.com/#organization',
				'name'        => 'Bella Technologies Private Limited',
				'url'         => 'https://bellatechnologies.in',
				'founder'     => [ '@id' => 'https://danieldeepak.com/#person' ],
				'description' => 'Spa and wellness businesses lose clients at three points — the enquiry, the booking, and the follow-up. Bella Technologies builds the CRM and automation system that fixes the full client journey, from first contact to repeat booking.',
				'areaServed'  => [ 'US-FL' ],
				'knowsAbout'  => [
					'spa enquiries that don\'t convert',
					'automated enquiry response for spas',
					'converting spa enquiries into paying clients',
					'no-shows in wellness studios',
					'booking confirmation automation',
					'reducing no-shows for wellness studios',
					'clients who don\'t return after first visit',
					'post-visit follow-up automation',
					'increasing repeat bookings for spas',
				],
				'serviceType' => 'End-to-end client journey automation for spa and wellness businesses — from enquiry and conversation through decision, purchase, follow-up, and repeat booking.',
			],
		],
	];

	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
add_action( 'wp_head', 'dd_front_page_jsonld' );
