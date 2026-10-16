<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="doctor-profile-container">
    
    <div class="doctor-photo-wrapper">
        <?php 
        $photo = get_field('doctor_photo');
        if( $photo ): ?>
            <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" class="doctor-photo" />
        <?php else: ?>
            <!-- صورة افتراضية في حال لم يتم رفع صورة -->
            <img src="https://cdn-icons-png.flaticon.com/512/3774/3774293.png" class="default-doctor-photo"/>
        <?php endif; ?>
    </div>

    <div class="doctor-info-side">
    <h1 class="doctor-title"><?php the_title(); ?></h1>
    
    <p class="info-lable1"><strong class="info-lable2">Specialization:</strong> <?php echo get_field('specialization') ?: 'General Medicine'; ?></p>
    
    <p class="info-lable1"><strong class="info-lable3">Age:</strong> <?php echo get_field('age') ?: '--'; ?> Years</p>
    <p class="info-lable1"><strong class="info-lable3">Nationality:</strong> <?php echo get_field('nationality') ?: 'Not Specified'; ?></p>
    
    
    <p class="info-lable1"><strong class="info-lable4">Consultation Fee:</strong> $<?php echo get_field('consultation_price') ?: '0'; ?></p>
    
    <div class="bio-box" style="background: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 5px solid #0073aa; margin-top: 20px;">
        <h3 class="doctor-bio">Biography</h3>
        <p class="bio-info">
            <?php 
            $bio = get_field('short_bio');
            echo $bio ? $bio : 'No biography info provided.'; 
            ?>
        </p>
    </div>

    <a href="http://clinicflow.local/contact-us/?doctor=<?php echo get_the_title()?>" class="booking-link">Book an Appointment</a>
</div>
</div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>