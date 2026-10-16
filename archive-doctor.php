<?php
get_header();
?>
<?php
       if(isset($_GET['search_term']))
	   {$search_term = $_GET['search_term'];
	   }
	   else
	   {
		   $search_term = "";
	   }
       if(isset($_GET['specialization_filter']) && !empty($_GET['specialization_filter']))
	   {
             $specialization = $_GET['specialization_filter'];
       }
       else
       {
           	$specialization = "";
	   }
	   if(isset($_GET['max_price']) && !empty($_GET['max_price']))
	   {
		   $max_price = $_GET['max_price'];
	   }
       else
       {
		   $max_price = "";
	   }		   
      $args = array(
	       'post_type' => 'doctor',
		   'posts_per_page' => -1,
		   //فلتر تم الغاؤه مؤقتاً
		   /*'meta_query' => array( 
		   array(
		   'key' => 'consultation_price',
		   'value' => '300',
		   'compare' => '!=',
		   )),*/
		   'orderby' => 'meta_value_num',
		   'meta_key' => 'consultation_price',
		   'order' => 'DESC',
		   's' => $search_term,
		   
		);
        $conditions = array();
		if(!empty($specialization)) {
          $conditions[] = array(
             'key' => 'specialization',
             'value' => $specialization,
             'compare' => '=',			 
		    );
        }
        if(!empty($max_price)) {
            $conditions[] = array(
             'key' => 'consultation_price',
             'value' => $max_price,
             'compare' => '<=',			 
		    );
        }
        if(!empty($conditions)) {
        $args['meta_query'] = $conditions;
}		
		$loop = new WP_Query($args); ?>
		
<main="content">
    <h1 class="archive-title">Our Medical Specialists</h1>
        <form  method="GET" class="search-form">
		<input name="search_term"><br>
        <input type="submit" value="Search"><br>
        <select name="specialization_filter" onchange="this.form.submit()" class="filter-select">
		<option value=""<?php echo ($specialization == "") ? "selected" : ""; ?>>All Specialization</option>
		<option value="Orthopedic Surgery"<?php echo ($specialization == "Orthopedic Surgery") ? "selected" : ""; ?>>Orthopedic Surgery</option>
		<option value="Internal Medicine (GP)"<?php echo ($specialization == "Internal Medicine (GP)") ? "selected" : ""; ?>>Internal Medicine (GP)</option>
		<option value="Dermatology"<?php echo ($specialization == "Dermatology") ? "selected" : ""; ?>>Dermatology</option>
		<option value="Ophthalmologist"<?php echo ($specialization == "Ophthalmologist") ? "selected" : ""; ?>>Ophthalmologist</option>
		<option value="Plastic & Reconstructive Surgeon"<?php echo ($specialization == "Plastic & Reconstructive Surgeon") ? "selected" : ""; ?>>Plastic & Reconstructive Surgeon</option>
		<option value="Micro-Neurosurgery"<?php echo ($specialization == "Micro-Neurosurgery") ? "selected" : ""; ?>>Micro-Neurosurgery</option>
		<option value="Forensic Pathologist"<?php echo ($specialization == "Forensic Pathologist") ? "selected" : ""; ?>>Forensic Pathologist</option>
		<option value="Trauma Surgeon (ER)"<?php echo ($specialization == "Trauma Surgeon (ER)") ? "selected" : ""; ?>>Trauma Surgeon (ER)</option>
		<option value="Cardiovascular Surgeon"<?php echo ($specialization == "Cardiovascular Surgeon") ? "selected" : ""; ?>>Cardiovascular Surgeon</option>
        </select>
        <select name="max_price" onchange="this.form.submit()" class="filter-select">
		<option value=""<?php echo ($max_price == "") ? "selected" : ""; ?>>All Prices</option>
		<option value="800"<?php echo ($max_price == "800") ? "selected" : ""; ?>>800</option>
		<option value="600"<?php echo ($max_price == "600") ? "selected" : ""; ?>>600</option>
		<option value="400"<?php echo ($max_price == "400") ? "selected" : ""; ?>>400</option>
		<option value="200"<?php echo ($max_price == "200") ? "selected" : ""; ?>>200</option>
        </select>		
		</form>
           <ul class="doctors-list">
    <?php if($loop -> have_posts()):while($loop->have_posts()):
          $loop -> the_post();
		    ?>
		   <li class="doctor-card">
		   <a href="<?php the_permalink()?>"><?php the_title();?></a>
		   <?php
           echo "<br>";		   
		   the_field('specialization');
		   echo "<br>";
		   the_field('consultation_price');
		   echo "<br><br>";
		   ?>
		   </li>
		   <?php
		    endwhile;
			endif;
			?>
		 </ul>
     <?php		 
	wp_reset_postdata();
	  ?>
    	
</main>
<?php
get_footer();
?>
