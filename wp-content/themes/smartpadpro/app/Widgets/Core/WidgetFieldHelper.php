<?php namespace App\Widgets\Core;

trait WidgetFieldHelper {
    /**
     * Generate a generic widget styled text field.
     * @param $field
     * @param $label
     * @param $value
     */
    public function generate_text($field, $label, $value) {
        $id   = $this->get_field_id($field);
        $name = $this->get_field_name($field);

        echo "
            <p>
                <label for='{$id}'>{$label}</label><br/>
                <input type='text' class='widefat' id='{$id}' name='{$name}' value='{$value}' />
            </p>
        ";
    }

    /**
     * Generate a generic widget styled textarea field.
     *
     * @param $field
     * @param $label
     * @param $value
     */
    public function generate_textarea($field, $label, $value) {
        $id   = $this->get_field_id($field);
        $name = $this->get_field_name($field);

        echo "
            <p>
                <label for='{$id}'>{$label}</label><br/>
                <textarea class='widefat' id='{$id}' name='{$name}' rows='5'>{$value}</textarea>
            </p>
        ";
    }

    /**
     * Generates a generic widget styled select field.
     * @param $field
     * @param $options
     * @param $label
     * @param $value
     */
    public function generate_select($field, $options, $label, $value) {
        $id      = $this->get_field_id($field);
        $name    = $this->get_field_name($field);
        $options = $this->optionCreator($options, $value);

        echo "<p>
                <label for='{$id}'>{$label}</label><br/>
                <select type='text' class='widefat' id='{$id}' name='{$name}'>
                    {$options}
                </select>
             </p>
        ";
    }

    /**
     * Creates option for select
     *
     * @param $options
     * @param $value
     * @return string
     */
    public function optionCreator($options, $value) {
        $optionsString = '';

        foreach($options as $option) {
            $selected = $option['value'] == $value ? 'selected' : '';
            $option['classes'] = isset($option['classes']) ? : '';

            $optionsString .= "<option value='{$option['value']}' class='{$option['classes']}' {$selected}>{$option['label']}</option>";
        }

        return $optionsString;
    }
}