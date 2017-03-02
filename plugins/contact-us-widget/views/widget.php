
<?php if(strlen(trim($phone_number))> 0) : ?>
    <div class = "contact-info">
        <i class="fa fa-phone contact-info-title" aria-hidden="true"></i>
        <a href="tel:778-456-7891"><p class = "contact-info-details"><?php echo $phone_number; ?></p></a>
    </div>
<?php endif; ?>

<?php if(strlen(trim($email))> 0) : ?>
    <div class = "contact-info">
        <i class="fa fa-envelope contact-info-title" aria-hidden="true"></i>
        <a href="mailto:info@inhabitent.com" target="_top"><p class = "contact-info-details"><?php echo $email; ?></p></a>
    </div>
<?php endif; ?>

<?php if(strlen(trim($street_address))> 0) : ?>
    <div class = "contact-info" >
        <i class="fa fa-map-marker contact-info-title" aria-hidden="true"></i>
        <p class = "contact-info-details"><?php echo "{$street_address} <br />{$city}, {$province} {$postal_code}"; ?></p>
    </div>
<?php endif; ?>