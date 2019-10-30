<?php namespace App\Widgets\Core;

trait WidgetHelper {

    /**
     * Fixes the instance(values)
     *
     * @param $instance
     * @return mixed
     */
    public function fixInstance($instance) {
        foreach($this->fields as $field) {
            $instance[$field] = isset($instance[$field]) ? $instance[$field] : '';
        }
        return $instance;
    }

}