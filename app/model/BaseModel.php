<?php
class BaseModel {
    public function __get ($name) {
        $method_name = "get_" . $name;

        if (method_exists ($this, $method_name)) {
            return $this->$method_name ();
        }

        trigger_error
            ('Undefined property via __get(): ' . $name, E_USER_WARNING);
        return null;
    }

    public function __set ($name, $value) {
        $method_name = "set_" . $name;

        if (method_exists ($this, $method_name)) {
            $this->$method_name ($value);
            return;
        }

        trigger_error
            ('Undefined property via __set(): ' . $name, E_USER_WARNING);
    }
}
?>
