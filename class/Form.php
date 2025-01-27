<?php
class Form {

    public static $class = "form-control";

    public static function checkbox (string $name, string $value, array $data = []): string
    {
    $attributes = ''; //sting vide par def 
    if (isset($data[$name]) && in_array($value, $data[$name])) {
      $attributes .= 'checked'; //ajoute checked si case cochée
    }
    $attributes = ' class= "' . self::$class . '"';
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes> 
    HTML; 
    }
}