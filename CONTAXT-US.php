<?php
/*
Template Name: Contaxt-us
*/
get_header();
?>

<!-- هنا تضع كود الـ PHP و نموذج الـ HTML الخاص بك -->
<?php 
if(isset($_GET['doctor'])){
	echo "Booking For: ".esc_html($_GET['doctor'])."<br>";	
}
if ( isset( $_POST['visitor_name'] ) ) {
    echo esc_html($_POST['visitor_name']) . '<br>';
    echo esc_html($_POST['visitor_email']) . '<br>';
    echo esc_html($_POST['visitor_message']) . '<br>';
	$name = sanitize_text_field($_POST['visitor_name']);
    $email = sanitize_text_field($_POST['visitor_email']);
    $msg = sanitize_text_field($_POST['visitor_message']);
	$message = "Name: ".$name." Email: ".$email." Message: ".$msg;
	$to = "clinic@hotmail.com";
	$subject = "New Client Has Arrived";
	wp_mail($to,$subject,$message);
}
?>

<form method="POST" action="">
    Name:<br>
    <input name="visitor_name"><br>
    Email:<br>
    <input name="visitor_email"><br>
    Message:<br>
    <input name="visitor_message"><br>
    <input type="submit" value="Submit">
</form>

<?php get_footer(); ?>