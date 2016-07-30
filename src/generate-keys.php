<?php

require 'random_compat/lib/random.php';

function generate($bytes = 32)
{
  $string = '';

  try {
    $string = random_bytes(32);
    $string = bin2hex($string);
  } catch (TypeError $e) {
    die("An unexpected type error has occurred");
  } catch (Error $e) {
    die("An unexpected error has occurred");
  } catch (Exception $e) {
    die("Could not generate a random string. Is your OS secure?");
  }

  return $string;
}


$salts = array(
  'COOKIE_SALT' => generate()
);


foreach($salts as $name => $salt) {
	print_r('$CONFIG[\''.$name.'\'] = \''.$salt.'\';');
}
