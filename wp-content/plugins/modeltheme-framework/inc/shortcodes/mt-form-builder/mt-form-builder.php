<?php
/**
||-> Shortcode: Search Domain
*/
function mt_affiliate_form_builder($params, $content) {
    extract( shortcode_atts( 
        array(
            'submit_button_label'                => '',
            'affiliate_form_action_url'                => '',
            'form_fields'               => '',
            'color'  => '',
        ), $params ) ); 
    $content = '';

    $form_fields = vc_param_group_parse_atts($params['form_fields']);
 
    $content .= '<div class="mt--eagle_mt_affiliate_form_builder">';
        $content .= '<form action="'.esc_url($affiliate_form_action_url).'" method="get" id="eaglesearch">';
            $content .= '<div class="row eagle-row-ride-sharing">';
                if ($form_fields) {
                    foreach($form_fields as $field){

                        #required
                        $required = '';
                        if (isset($field['required']) && !empty($field['required'])) {
                            $required = 'required';
                        }

                        #label
                        $label = '';
                        if (isset($field['label']) && !empty($field['label'])) {
                            $label = $field['label'];
                        }

                        #value
                        $value = '';
                        if (isset($field['value']) && !empty($field['value'])) {
                            $value = $field['value'];
                        }

                        #name
                        $name = '';
                        if (isset($field['name']) && !empty($field['name'])) {
                            $name = $field['name'];
                        }

                        #placeholder
                        $placeholder = '';
                        if (isset($field['placeholder']) && !empty($field['placeholder'])) {
                            $placeholder = $field['placeholder'];
                        }

                        #date_format
                        $date_format = '';
                        if (isset($field['date_format']) && !empty($field['date_format'])) {
                            $date_format = $field['date_format'];
                        }

                        // echo '<pre>' . var_export($field['required'], true) . '</pre>';
                        if ($field['field'] == 'input_text' || $field['field'] == 'input_number' || $field['field'] == 'input_hidden') {
                            
                            #field type
                            $type = 'text';
                            if($field['field'] == 'input_text'){
                                $type = 'text';
                            }elseif($field['field'] == 'input_number'){
                                $type = 'number';
                            }elseif($field['field'] == 'input_hidden'){
                                $type = 'hidden';
                            }

                            // html
                            $id = 'field_'.uniqid();
                            $content .= '<div class="col-sm-12 mt_single_builder_field mt_field--'.$field['field'].'">';
                                if (isset($field['label']) && !empty($field['label'])) {
                                    $content .= '<label for="'.$id.'">'.esc_html($label).'</label>';
                                }
                                $content .= '<input id="'.$id.'" '.$required.' type="'.$type.'" value="'.$value.'" name="'.$name.'" placeholder="'.$placeholder.'" class="form-control" />';
                            $content .= '</div>';
                        }
                    
                        if ($field['field'] == 'textarea') {
                            // html
                            $id = 'field_'.uniqid();
                            $content .= '<div class="col-sm-12 mt_single_builder_field mt_field--'.$field['field'].'">';
                                if (isset($field['label']) && !empty($field['label'])) {
                                    $content .= '<label for="'.$id.'">'.esc_html($label).'</label>';
                                }
                                $content .= '<textarea id="'.$id.'" '.$required.' name="'.$name.'" placeholder="'.$placeholder.'" class="form-control">'.$value.'</textarea>';
                            $content .= '</div>';
                        }
                    }
                }
             
                $content .= '<div class="col-md-12">';
                    $content .= '<input type="submit" class="rippler rippler-default button-winona btn btn-lg tabs_button" style="background:'.$color.';" name="submit" name="submit" value="'.esc_attr($submit_button_label).'" />';
                $content .= '</div>';
            $content .= '</div>';
        $content .= '</form>';
    $content .= '</div>';
    return $content;
}
add_shortcode('mt_affiliate_form_builder_shortcode', 'mt_affiliate_form_builder');


/**
||-> Map Shortcode in Visual Composer with: vc_map();
*/
if ( function_exists('vc_map') ) {
    vc_map( 
        array(
            "name" => esc_attr__("MT - Affiliate Form Builder", 'modeltheme'),
            "base" => "mt_affiliate_form_builder_shortcode",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                    "group" => "General Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Form Action url", 'modeltheme' ),
                    "param_name" => "affiliate_form_action_url",
                    "value" => "",
                    "description" => esc_attr__( "Example: https://sameday.ro/?", 'modeltheme' )
                ),
                array(
                    "group"        => "General Options",
                    "type"         => "textfield",
                    "holder"       => "div",
                    "class"        => "",
                    "param_name"   => "submit_button_label",
                    "heading"      => esc_attr__("Submit Button label", 'modeltheme'),
                    "description"  => esc_attr__("Enter Submit button label", 'modeltheme'),
                ),
                array(
                    "group" => "General Options",
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_attr__( "Choose custom background color" , 'modeltheme'),
                    "param_name" => "color",
                    "value" => '#ff3514', //Default color #ff3514
                    "description" => esc_attr__( "Choose background color", 'modeltheme' )
                 ),
                array(
                    "group"        => esc_attr__( "Form Fields Builder", 'modeltheme' ),
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'form_fields',
                    // Note params is mapped inside param-group:
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__( 'Field Type', 'js_composer' ),
                            'value' => array(
                                esc_html__( 'Input text', 'js_composer' ) => 'input_text',
                                esc_html__( 'Input number', 'js_composer' ) => 'input_number',
                                esc_html__( 'Input hidden', 'js_composer' ) => 'input_hidden',
                                esc_html__( 'Input datepicker', 'js_composer' ) => 'input_datepicker',
                                esc_html__( 'Textarea', 'js_composer' ) => 'textarea',
                            ),
                            'admin_label' => true,
                            'param_name' => 'field',
                            'description' => esc_html__( 'Select icon library.', 'js_composer' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Label',
                            'param_name' => 'label',
                            'description' => esc_html__( 'Placeholder for the current field: Eg: "Insert The AWB"', 'js_composer' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Placeholder',
                            'param_name' => 'placeholder',
                            'description' => esc_html__( 'Placeholder for the current field: Eg: "Enter the AWB"', 'js_composer' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Name',
                            'param_name' => 'name',
                            'description' => esc_html__( 'Placeholder for the current field: Eg: "order_awb"', 'js_composer' ),
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Value',
                            'param_name' => 'value',
                            'description' => esc_html__( 'Placeholder for the current field: Eg: "AWB"', 'js_composer' ),
                        ),
                        array(
                            'type' => 'checkbox',
                            'value' => '',
                            'heading' => 'Required?',
                            'param_name' => 'required',
                            'description' => esc_html__( 'Set if the field will be required or not.', 'js_composer' ),
                        )
                    )
                ) 
            )
        )
    );
}