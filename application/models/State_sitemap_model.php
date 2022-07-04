<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * A class for generating XML sitemaps and sitemap indexes with the CodeIgniter PHP Framework
 * More information about sitemaps: http://www.sitemaps.org/protocol.html
 * 
 * @author Gerard Nijboer <me@gerardnijboer.com>
 * @version 1.0
 * @access public
 *
 */
class State_sitemap_model extends CI_Model {


// --------------------------------------------
public function state_sitemap_creater_fm($state_id){
	$this->db->where('state_id',$state_id);
	$this->db->where('total_segments','3');
    $this->db->select(array('uri_string','lastmod'));
	$result = $this->db->get('meta')->result_array();
    // echo '<pre>';
	// var_dump($result);

    foreach($result as $url){
        $uri_string = $url['uri_string'];
        $lastmod = $url['lastmod'];
        $article = array(
			'loc' => base_url($uri_string),
			'lastmod' => $lastmod,
			'changefreq' => 'monthly',
			'priority' => 0.8
		);
		$this->sitemapmodel->add(
			$article['loc'], 
			$article['lastmod'], 
			$article['changefreq'], 
			$article['priority']);
		}
		$this->sitemapmodel->output();
    
}
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
}