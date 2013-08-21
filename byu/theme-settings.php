<?php

function byu_form_system_theme_settings_alter(&$form, &$form_state)  {

  $form['theme_settings']['parent_org'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Parent Organization'),
    '#default_value' => theme_get_setting('parent_org'),
    '#description'   => t("Enter the name of your parent organization to be displayed in the header. Leave blank to use the full Brigham Young University logo."),
  );
  
  $form['theme_settings']['parent_org_link'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Parent Organization Website'),
    '#default_value' => theme_get_setting('parent_org_link'),
    '#description'   => t("Enter the URL of your parent organization. (Example: http://college.byu.edu)"),
  );

  // Remove some of the base theme's settings.
  unset($form['themedev']['zen_layout']);
  unset($form['breadcrumb']['breadcrumb_options']['zen_breadcrumb_separator']);
  unset($form['logo']);
}
