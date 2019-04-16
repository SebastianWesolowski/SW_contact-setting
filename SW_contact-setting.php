<?php
/*
Plugin URI: warsztatkodu.pl
Description: Customize WordPress admin theme
Version: 1.0.1
Author: Sebastian Wesołowski
Author URI: warsztatkodu.pl
Copyright: Sebastian Wesołowski
*/


add_action('admin_menu', function () {
    add_menu_page('Dane Kontaktowe', 'Dane Kontaktowe Page', 'manage_options', 'theme-options', 'theme_options_page');
});

add_action('admin_init', function () {
    add_settings_section("header_section_CONTACT", "Kontakt w sprawach handlowych", "contact_form_warszawa", "theme-options");
    add_settings_field("phone-warszawa", "Warszawa", "phone_field_warszawa", "theme-options", "header_section_CONTACT");
    register_setting('header_section_CONTACT','phone_warszawa');
    register_setting('header_section_CONTACT','mail_warszawa');
    register_setting('header_section_CONTACT','work_time_all');

    add_settings_field("phone-krakow", "Kraków", "phone_field_krakow", "theme-options", "header_section_CONTACT");
    register_setting('header_section_CONTACT','phone_krakow');
    register_setting('header_section_CONTACT','mail_krakow');

    add_settings_field("phone-wroclaw", "Wrocław", "phone_field_wroclaw", "theme-options", "header_section_CONTACT");
    register_setting('header_section_CONTACT','phone_wroclaw');
    register_setting('header_section_CONTACT','mail_wroclaw');

    add_settings_field("phone-helpdesk", "Całodobowy helpdesk", "phone_field_helpdesk", "theme-options", "header_section_CONTACT");
    register_setting('header_section_CONTACT','phone_helpdesk');
    register_setting('header_section_CONTACT','mail_helpdesk');
});

function contact_form_warszawa() {
    echo "Wpisz dane kontaktowe dla miast";
}

function phone_field_warszawa() {
    ?>
        <label for="phone_warszawa">Telefon</label><br>
        <input name="phone_warszawa" type="text" id="phone_warszawa" value="<?php echo get_option('phone_warszawa') ?>" class="regular-text"><br>
        <label for="mail_warszawa">E-mail</label><br>
        <input name="mail_warszawa" type="text" id="mail_warszawa" value="<?php echo get_option('mail_warszawa') ?>" class="regular-text"><br>
        <label for="work_time_all">Czas pracy</label><br>
        <input name="work_time_all" type="text" id="work_time_all" value="<?php echo get_option('work_time_all') ?>" class="regular-text"><br>
    <?php
}
function phone_field_krakow() {
    ?>
        <label for="phone_krakow">Telefon</label><br>
        <input name="phone_krakow" type="text" id="phone_krakow" value="<?php echo get_option('phone_krakow') ?>" class="regular-text"><br>
        <label for="mail_krakow">E-mail</label><br>
        <input name="mail_krakow" type="text" id="mail_krakow" value="<?php echo get_option('mail_krakow') ?>" class="regular-text"><br>
    <?php
}
function phone_field_wroclaw() {
    ?>
        <label for="phone_wroclaw">Telefon</label><br>
        <input name="phone_wroclaw" type="text" id="phone_wroclaw" value="<?php echo get_option('phone_wroclaw') ?>" class="regular-text"><br>
        <label for="mail_wroclaw">E-mail</label><br>
        <input name="mail_wroclaw" type="text" id="mail_wroclaw" value="<?php echo get_option('mail_wroclaw') ?>" class="regular-text"><br>
    <?php
}
function phone_field_helpdesk() {
    ?>
        <label for="phone_helpdesk">Telefon</label><br>
        <input name="phone_helpdesk" type="text" id="phone_helpdesk" value="<?php echo get_option('phone_helpdesk') ?>" class="regular-text"><br>
        <label for="mail_helpdesk">E-mail</label><br>
        <input name="mail_helpdesk" type="text" id="mail_helpdesk" value="<?php echo get_option('mail_helpdesk') ?>" class="regular-text"><br>
    <?php
}

function theme_options_page() {
    ?>
        <div class="wrap">
            <div id="icon-options-general" class="icon32"><br></div>
            <h1>Dane Kontaktowe</h1>
            <form method="post" action="options.php">
                <?php
                    settings_fields("header_section_CONTACT");
                    do_settings_sections("theme-options");
                    submit_button();
                ?>
            </form>
        </div>
    <?php
}

?>