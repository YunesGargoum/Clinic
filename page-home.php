<?php
/*
Template Name: ClinicFlow Home
*/
get_header();
?>
<main class="home-style">
    <h1 class="home-title">Welcome to ClinicFlow</h1>
    <p class="home-paragraph">
        Find trusted specialists, browse their profiles, and book your appointment in minutes.
    </p>
    <a href="<?php echo esc_url(home_url('/doctors/')); ?>" class="home-archive-link">
        Browse Our Doctors →
    </a>
</main>
<?php get_footer(); ?>