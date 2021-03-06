<?php

namespace Form;
/**
 * Class Form
 */
class Form {
  /**
   * __construct
   */
  public function __construct()
  {

  }
  /**
   * $form->get_processed_fields_values($request_method)
   * Method accepts a request method ( GET or POST ) and generates an array with trimed and non-XSS values
   * @param array
   * @return array
   */
  public function get_processed_fields_values($request_method) {
    $request = $request_method;
    $processed_fields = array();

    foreach ( $request as $name => $value )
    {
      $processed_fields[$name] = htmlspecialchars(trim($value));
    }

    return $processed_fields;
  }

}
