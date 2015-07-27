<?php 
require('../wp-blog-header.php');
class webservices{

	public function posts()
	{
		global $post;
		if(isset($_POST['category'])){
			$category = trim($_POST['category']);
			$args = array(
			    'post_type' => 'post',
			    'category'  => $category ,
			    'posts_per_page' => -1,
			    'order' => 'DESC',
			    'meta_key' => 'show_to_donnet_site', 
			    'meta_value' => 'yes'
			);
		}else{
			$args = array(
			    'post_type' => 'post',
			    'posts_per_page' => -1,
			    'order' => 'DESC',
			    'meta_key' => 'show_to_donnet_site', 
			    'meta_value' => 'yes'
			);
		}
			$posts = get_posts($args);
			if(!empty($posts)){
				foreach ($posts as $post) : setup_postdata( $post );
					$post_title = $post->post_title;  
					$post_content = $post->post_content;  
					$post_link = get_the_permalink();
					$post_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ,'thumbnail_size');

					$category_detail=get_the_category($post->ID);//$post->ID
					//print_r($category_detail);
					foreach($category_detail as $cd){
						$category_name = $cd->cat_name;
						$category_id = $cd->cat_ID;
					}
				$result[]  = array(
					'post_title' => $post_title,
					'post_content' => $post_content,
					'post_link' => $post_link,
					'post_image' => $post_image,
					'category_name' => $category_name,
					'category_id' => $category_id 
				);
				endforeach;
				$message = array(
	                "success" => "true",
	                "error" => "null",
	                "post_data" => $result
	            ); 
	            echo json_encode(array('response' => $message));
	        }else{
	        	$message = array(
	                "success" => "false",
	                "error" => "Record not available",
	                "post_data" => "Record not available"
	            ); 
	            echo json_encode(array('response' => $message));
	        }
		
	}


	public function featured_expert()
	{
		global $post;
		
			$args = array(
			    'post_type' => 'featured-expert',
			    'posts_per_page' => -1,
			    'order' => 'DESC',
			    'meta_key' => 'show_to_donnet_site', 
			    'meta_value' => 'yes'
			);
		
			$posts = get_posts($args);
			if(!empty($posts)){
				foreach ($posts as $post) : setup_postdata( $post );
					$post_title = $post->post_title;  
					$post_content = $post->post_content;  
					$post_link = get_the_permalink();
					$post_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ,'thumbnail_size');

					
				$result[]  = array(
					'post_title' => $post_title,
					'post_content' => $post_content,
					'post_link' => $post_link,
					'post_image' => $post_image
				);
				endforeach;
				$message = array(
	                "success" => "true",
	                "error" => "null",
	                "featured_expert" => $result
	            ); 
	            echo json_encode(array('response' => $message));
	        }else{
	        	$message = array(
	                "success" => "false",
	                "error" => "Record not available",
	                "featured_expert" => "Record not available"
	            ); 
	            echo json_encode(array('response' => $message));
	        }
		
	}


	public function photo_of_week()
	{
		global $post;
		$getfieldtitle =  get_post_meta('4', '_photo_title', true);
		$getfieldphoto =  get_field('_photo',4); 
		$getfielddesc =  get_post_meta('4', '_photo_description', true);
					
		$result[]  = array(
			'photo_title' => $getfieldtitle,
			'photo_description' => $getfielddesc,
			'photo_image' => $getfieldphoto
		);
		
		$message = array(
            "success" => "true",
            "error" => "null",
            "photo_of_week" => $result
        ); 
        echo json_encode(array('response' => $message));
	
		
	}

	public function slider_post()
	{
		global $post;
		$args = array(
		    'post_type' => 'asp-slider',
		    'posts_per_page' => -1,
		    'order' => 'DESC'
		);
	
		$posts = get_posts($args);
		if(!empty($posts)){
			foreach ($posts as $post) : setup_postdata( $post );
				$post_title = $post->post_title;  
				$post_content = $post->post_content;  
				$post_link = get_the_permalink();
				$post_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ,'thumbnail_size');

				
			$result[]  = array(
				'slider_title' => $post_title,
				'slider_content' => $post_content,
				'slider_link' => $post_link,
				'slider_image' => $post_image
			);
			endforeach;
			$message = array(
                "success" => "true",
                "error" => "null",
                "slider_posts" => $result
            ); 
            echo json_encode(array('response' => $message));
        }else{
        	$message = array(
                "success" => "false",
                "error" => "Record not available",
                "slider_posts" => "Record not available"
            ); 
            echo json_encode(array('response' => $message));
        }
	
		
	}

	public function five_things_need()
	{
		global $post;
		$args = array(
		    'post_type' => 'five-things',
		    'posts_per_page' => -1,
		    'order' => 'DESC'
		);
	
		$posts = get_posts($args);
		if(!empty($posts)){
			foreach ($posts as $post) : setup_postdata( $post );
				$post_title = $post->post_title;  
				$post_content = $post->post_content;  
				$post_link = get_the_permalink();

				
			$result[]  = array(
				'slider_title' => $post_title,
				'slider_content' => $post_content,
				'slider_link' => $post_link,
				'slider_image' => $post_image
			);
			endforeach;
			$message = array(
                "success" => "true",
                "error" => "null",
                "five_things" => $result
            ); 
            echo json_encode(array('response' => $message));
        }else{
        	$message = array(
                "success" => "false",
                "error" => "Record not available",
                "five_things" => "Record not available"
            ); 
            echo json_encode(array('response' => $message));
        }
	
		
	}
}

$obj = New webservices();
//print_r($_REQUEST);
$posts = $obj->$_REQUEST['method']();

 ?>
