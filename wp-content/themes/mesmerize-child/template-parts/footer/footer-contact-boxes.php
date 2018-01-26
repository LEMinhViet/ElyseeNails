<div <?php echo mesmerize_footer_container('footer-contact-boxes') ?>>
    <div <?php echo mesmerize_footer_background('footer-content') ?>>
        <div class="gridContainer">
            <div class="row text-center">
                <div class="col-sm-3">
                    <?php echo mesmerize_print_contact_boxes(0); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo mesmerize_print_contact_boxes(1); ?>
                </div>
                <div class="col-sm-3">
                    <?php echo mesmerize_print_phone_boxes(2); ?>
                </div>
                <div class="col-sm-3 footer-bg-accent">
                    <div>
                        <?php mesmerize_print_area_social_icons('footer', 'content', 'footer-social-icons', 5);?>
                    </div>
                    <?php echo mesmerize_get_footer_copyright(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function mesmerize_print_phone_boxes($index = 0)
{
    $fields = mesmerize_get_footer_contact_boxes($index);

    $preview_atts = "";

    if (mesmerize_is_customize_preview()) {
        $setting      = esc_attr($fields['icon_mod']);
        $preview_atts = "data-focus-control='{$setting}'";
    }

    ?>
    <div data-type="group" <?php echo $preview_atts; ?> data-dynamic-mod="true">
        <i class="big-icon fa <?php echo get_theme_mod($fields['icon_mod'], $fields['icon_default']); ?>"></i>
        <a id="phone-number" href="tel:// <?php echo get_theme_mod($fields['text_mod'], $fields['text_default']); ?>">
            <?php echo wp_kses_post(get_theme_mod($fields['text_mod'], $fields['text_default'])); ?>
        </a>
    </div>
    <?php
}
