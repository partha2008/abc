<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$config['site_info'] = array(
		"email_smtp_host" => "localhost",
		"email_smtp_port" => "25",
		"smtp_email" => "",
		"smtp_password" => "",
		"max_register_user" => 10
	);
	
	// Bootstrap Pagination Configuration
	$config['pagination']['per_page'] = PAGINATION_PER_PAGE;
	$config['pagination']["uri_segment"] = 3;
	$config['pagination']["num_links"] = 2;
	
	$config['pagination']['use_page_numbers'] = TRUE;
	$config['pagination']['page_query_string'] = TRUE;
	$config['pagination']['query_string_segment'] = 'page';
	$config['pagination']['reuse_query_string'] = TRUE;
	
	$config['pagination']['full_tag_open'] = '<ul class="pagination">';
	$config['pagination']['full_tag_close'] = '</ul>';

	$config['pagination']['first_link'] = '&laquo; First';
	$config['pagination']['first_tag_open'] = '<li class="prev page">';
	$config['pagination']['first_tag_close'] = '</li>';

	$config['pagination']['last_link'] = 'Last &raquo;';
	$config['pagination']['last_tag_open'] = '<li class="next page">';
	$config['pagination']['last_tag_close'] = '</li>';

	$config['pagination']['next_link'] = 'Next &rarr;';
	$config['pagination']['next_tag_open'] = '<li class="next page">';
	$config['pagination']['next_tag_close'] = '</li>';

	$config['pagination']['prev_link'] = '&larr; Previous';
	$config['pagination']['prev_tag_open'] = '<li class="prev page">';
	$config['pagination']['prev_tag_close'] = '</li>';

	$config['pagination']['cur_tag_open'] = '<li class="active"><a href="">';
	$config['cur_tag_close'] = '</a></li>';

	$config['pagination']['num_tag_open'] = '<li class="page">';
	$config['pagination']['num_tag_close'] = '</li>';

	$config['pagination']['anchor_class'] = 'follow_link';
	// Ends
	
	// SMTP configuration
	$config['smtp']['protocol'] = "sendmail";
	$config['smtp']['smtp_host'] = "localhost";
	$config['smtp']['smtp_port'] = "25";
	$config['smtp']['smtp_user'] = ""; 
	$config['smtp']['smtp_pass'] = "";
	$config['smtp']['charset'] = "iso-8859-1";
	$config['smtp']['mailtype'] = "html";
	$config['smtp']['newline'] = "\r\n";
	
	// Months array
	$config['month'][] = 'January'; 
	$config['month'][] = 'February'; 
	$config['month'][] = 'March'; 
	$config['month'][] = 'April'; 
	$config['month'][] = 'May'; 
	$config['month'][] = 'June'; 
	$config['month'][] = 'July'; 
	$config['month'][] = 'August'; 
	$config['month'][] = 'Sepetember'; 
	$config['month'][] = 'October'; 
	$config['month'][] = 'November'; 
	$config['month'][] = 'December';