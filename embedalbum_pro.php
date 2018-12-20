<?php
/*
Plugin Name: EmbedSocial - Platform for social media tools
elugin URI: http://www.embedsocial.com
Description: Social media photos and reviews and feeds on your website
Author: EmbedSocial
Author URI: http://www.embedsocial.com
Version: 1.1.16
 */
defined( 'ABSPATH' ) or die;
class EmbedSocialPlugin {

    private $url = "https://embedsocial.com/facebook_album/";
    private $urlEmbedScripts = "https://embedsocial.com/embedscript/";

    private function send_error_msg() {
        $current_user = wp_get_current_user();
        if (user_can($current_user, 'administrator')) {
            $msg = "An error occured(E1135). Please contact us.<br/>";
        } else {
            $msg = "";
        } 

        echo $msg;
        wp_die();
    }

    public function __construct() {}

    public function hook_embed_gallery_js() {
        wp_register_script('EmbedSocialGalleryScript', $this->urlEmbedScripts.'biw.js');
        wp_enqueue_script('EmbedSocialGalleryScript', $this->urlEmbedScripts.'biw.js');
    }

    public function hook_embed_instagram_js() {
        wp_register_script('EmbedSocialInstagramScript', $this->urlEmbedScripts.'in.js');
        wp_enqueue_script('EmbedSocialinstagramScript', $this->urlEmbedScripts.'in.js');
    }

    public function hook_embed_twitter_js() {
        wp_register_script('EmbedSocialTwitterScript', $this->urlEmbedScripts.'ti.js');
        wp_enqueue_script('EmbedSocialtwitterScript', $this->urlEmbedScripts.'ti.js');
    }

    public function hook_embed_album_js() {
        wp_register_script('EmbedSocialScript', $this->urlEmbedScripts.'eiw.js');
        wp_enqueue_script('EmbedSocialScript', $this->urlEmbedScripts.'eiw.js');
    }

	public function hook_embed_google_album_js() {
		wp_register_script('EmbedSocialGoogleScript', $this->urlEmbedScripts.'gi.js');
        wp_enqueue_script('EmbedSocialGoogleScript', $this->urlEmbedScripts.'gi.js');
	}

	public function hook_embed_socialfeed_js() {
		wp_register_script('EmbedSocialSocialFeedScript', $this->urlEmbedScripts.'sf.js');
        wp_enqueue_script('EmbedSocialSocialFeedScript', $this->urlEmbedScripts.'sf.js');
	}

    public function hook_embed_reviews_js() {
        wp_register_script('EmbedSocialReviewsScript', $this->urlEmbedScripts.'ri.js');
        wp_enqueue_script('EmbedSocialReviewsScript', $this->urlEmbedScripts.'ri.js');
    }

	public function hook_embed_google_reviews_js() {
        wp_register_script('EmbedSocialGoogleReviewsScript', $this->urlEmbedScripts.'gri.js');
        wp_enqueue_script('EmbedSocialGoogleReviewsScript', $this->urlEmbedScripts.'gri.js');
    }

	public function hook_embed_custom_reviews_js() {
        wp_register_script('EmbedSocialCustomReviewsScript', $this->urlEmbedScripts.'cri.js');
        wp_enqueue_script('EmbedSocialCustomReviewsScript', $this->urlEmbedScripts.'cri.js');
    }

	public function hook_embed_story_js() {
        wp_register_script('EmbedSocialStoriesScript', $this->urlEmbedScripts.'st.js');
        wp_enqueue_script('EmbedSocialStoriesScript', $this->urlEmbedScripts.'st.js');
    }
	public function hook_embed_hashtag_js() {
        wp_register_script('EmbedSocialHashtagScript', $this->urlEmbedScripts.'ht.js');
        wp_enqueue_script('EmbedSocialHashtagScript', $this->urlEmbedScripts.'ht.js');
    }

	public function hook_embed_story_popup_js() {
        wp_register_script('EmbedSocialStoriesPopupScript', $this->urlEmbedScripts.'stp.js');
        wp_enqueue_script('EmbedSocialStoriesPopupScript', $this->urlEmbedScripts.'stp.js');
    }

	public function hook_embed_story_gallery_js() {
        wp_register_script('EmbedSocialStoryGalleryScript', $this->urlEmbedScripts.'stg.js');
        wp_enqueue_script('EmbedSocialStoryGalleryScript', $this->urlEmbedScripts.'stg.js');
    }

    public function embedsocial_fb_album_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this,"hook_embed_album_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']); 
            $out .= "<div class='embedsocial-album' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

    public function embedsocial_fb_gallery_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_gallery_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-gallery' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }   

    public function embedsocial_instagram_album_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_instagram_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-instagram' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

    public function embedsocial_twitter_album_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_twitter_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-twitter' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

	public function embedsocial_google_album_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_google_album_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-google-place' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

    public function embedsocial_feed_shortcode( $atts ) 
    {
		add_action('wp_footer', array($this, "hook_embed_socialfeed_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-socialfeed' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

    public function embedsocial_reviews_album_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_reviews_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-reviews' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

	public function embedsocial_google_reviews_album_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_google_reviews_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-google-reviews' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }
	
	public function embedsocial_custom_reviews_album_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_custom_reviews_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-custom-reviews' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

	public function embedsocial_stories_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_story_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-stories' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

	public function embedsocial_stories_popup_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_story_popup_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-stories-popup' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

	public function embedsocial_story_gallery_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_story_gallery_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-story-gallery' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }
	public function embedsocial_hashtag_shortcode( $atts ) 
    {
        add_action('wp_footer', array($this, "hook_embed_hashtag_js"));

        $shortcodeId = (shortcode_atts(array(
            'id' => ''
        ), $atts));

        $out = "";
        if ($shortcodeId['id']) {
            $shortcodeId['id'] = sanitize_text_field($shortcodeId['id']);
            $out .= "<div class='embedsocial-hashtag' data-ref='{$shortcodeId['id']}'></div>";
        }
        return $out;
    }

	public function embedsocial_schema_shortcode( $atts ) 
    {
        $params = (shortcode_atts(array(
            'id' => '',
            'type' => '',
            'name' => '',
            'address' => '',
            'telephone' => '',
            'price_range' => '',
            'url' => '',
            'logo_url' => '',
            'summary' => 'hide',
            'summary_url' => '',
            'opening_hours' => '',
            'image' => '',
            'latitude' => '',
            'longitude' => '',
            'address_locality' => '',
            'address_region' => '',
            'postal_code' => '',
            'street_address' => ''
        ), $atts));

        $out = "";
        if ($params['id']) {
            $params['id'] = sanitize_text_field($params['id']);
            $key = $params['id'] . '_schema';
            $group = 'embedsocial';
            $data = wp_cache_get($key, $group);
            if ($data) {
                return $this->schemaUpdate($data, $params);
            }

            $response = wp_remote_get('https://embedsocial.com/api/reviews_schema_data/' . $params['id']);
            if (wp_remote_retrieve_response_code($response) >= 400) {
                return "";
            }
            $data = wp_remote_retrieve_body($response);
            if ($data) {
                $data = json_decode($data, true);
                if (isset($data['success']) && $data['success']) {

                    $schema = $data['schema'];
                    wp_cache_set($key, $schema, $group, 7200);
                    return $this->schemaUpdate($schema, $params);
                }
            }
        }
        return $out;
    }

    private function schemaUpdate($schema, $params) {

        $jsonSchema = strip_tags($schema);
        $jsonSchema = json_decode($jsonSchema);

        if ($jsonSchema) {

            $out = '';
            if (isset($params['summary']) && $params['summary'] === 'show') {
                $width = 84 * ($jsonSchema->aggregateRating->ratingValue / 5);
                $out .= "<style scoped>.review-summary{text-align: center;} .review-post-rating {background-image: url(https://cdn.embedsocial.com/allstars.png);width:{$width}px; height: 16px; display: inline-block; margin-right: 10px;}</style>";
                $out .= '<div class="review-summary"><div><div><span class="review-post-rating"></span><span class="review-post-rating-words"><span>' . $jsonSchema->aggregateRating->ratingValue . '</span> out of <span>5</span> Stars</span></div><div><a href="' . $params['summary_url'] . '"><span>' . $jsonSchema->aggregateRating->reviewCount . '</span> Customer Reviews</a></div></div></div>';
            }

            $out .= "<script type='application/ld+json' class='reviews-schema' data-ref='{$params['id']}'>";
            $out .= '{ "@context": "http://schema.org",';
            if ($params['type']) {
                $out .= '"@type": "' . $params['type'] .'",'; 
            } else {
                $out .= '"@type": "' . $jsonSchema->{'@type'} .'",'; 
            }
            if ($params['name']) {
                $out .= '"name": "' . $params['name'] .'",'; 
            } else {
                $out .= '"name": "' . $jsonSchema->{'name'} .'",'; 
            }
            if ($params['url']) {
                $out .= '"url": "' . $params['url'] .'",'; 
            } 
            if ($params['logo_url']) {
                $out .= '"logo": "' . $params['logo_url'] .'",'; 
            } 

            if ($params['address_locality'] && $params['postal_code'] && $params['street_address']) {
                $out .= '"address": {"@type": "PostalAddress", "addressLocality": "'.$params['address_locality'].'", "addressRegion": "'.$params['address_region'].'", "postalCode": "'.$params['postal_code'].'", "streetAddress": "'.$params['street_address'].'"},';

            } else if ($params['address']) {
                $out .= '"address": "' . $params['address'] .'",'; 
            } 

            if ($params['price_range']) {
                $out .= '"priceRange": "' . $params['price_range'] .'",'; 
            } 
            if ($params['telephone']) {
                $out .= '"telephone": "' . $params['telephone'] .'",'; 
            } 
            if ($params['opening_hours']) {
                $out .= '"openingHours": "' . $params['opening_hours'] .'",'; 
            } 
            if ($params['image']) {
                $out .= '"image": "' . $params['image'] .'",'; 
            } 
            if ($params['latitude'] && $params['longitude']) {
                $out .= '"geo": { "@type": "GeoCoordinates", "latitude": "' . $params['latitude'] . '", "longitude": "' . $params['longitude'] . '" },';
            } 
            $out .= '"aggregateRating":  {  "@type": "AggregateRating",  "ratingValue": "' . $jsonSchema->aggregateRating->ratingValue . '", "ratingCount": "'. $jsonSchema->aggregateRating->reviewCount .'" }'; 
            $out .= '} </script>';
           
            return $out;
        }

        return $schema;
    }
}

$plugin = new EmbedSocialPlugin();

add_shortcode('embedsocial_schema', array($plugin, 'embedsocial_schema_shortcode'));
add_shortcode('embedsocial_album', array($plugin, 'embedsocial_fb_album_shortcode'));
add_shortcode('embedsocial_gallery', array($plugin, 'embedsocial_fb_gallery_shortcode'));
add_shortcode('embedsocial_instagram', array($plugin, 'embedsocial_instagram_album_shortcode'));
add_shortcode('embedsocial_twitter', array($plugin, 'embedsocial_twitter_album_shortcode'));   
add_shortcode('embedsocial_google_album', array($plugin, 'embedsocial_google_album_shortcode'));  
add_shortcode('embedsocial_feed', array($plugin, 'embedsocial_feed_shortcode'));   
add_shortcode('embedsocial_reviews', array($plugin, 'embedsocial_reviews_album_shortcode'));
add_shortcode('embedsocial_google_reviews', array($plugin, 'embedsocial_google_reviews_album_shortcode'));
add_shortcode('embedsocial_custom_reviews', array($plugin, 'embedsocial_custom_reviews_album_shortcode'));
add_shortcode('embedsocial_stories', array($plugin, 'embedsocial_stories_shortcode'));
add_shortcode('embedsocial_stories_popup', array($plugin, 'embedsocial_stories_popup_shortcode'));
add_shortcode('embedsocial_story_gallery', array($plugin, 'embedsocial_story_gallery_shortcode'));
add_shortcode('embedsocial_hashtag', array($plugin, 'embedsocial_hashtag_shortcode'));
?>
