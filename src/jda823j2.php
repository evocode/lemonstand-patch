<?php

require PATH_APP.'/phproad/thirdpart/random_compat/lib/random.php';

function generate($bytes = 32)
{
  $string = '';

  try {
    $string = random_bytes(32);
    $string = bin2hex($string);
  } catch (TypeError $e) {
    // die("An unexpected error has occurred");
  } catch (Error $e) {
    // die("An unexpected error has occurred");
  } catch (Exception $e) {
    // die("Could not generate a random string. Is our OS secure?");
  }

  return $string;
}

function writeFile($path, $contents)
{
    if ( !($fp = @fopen( $path, 'a' )) )
      return false;

    flock( $fp, LOCK_EX );

    if ( !@fwrite( $fp, $contents ) )
    {
      fclose( $fp );
      return false;
    }

    flock( $fp, LOCK_UN );
    fclose( $fp );

    return true;
}

$salts = array(
  'COOKIE_SALT' => generate()
);

$config_dir = PATH_APP."/config";
$key_file = $config_dir."/keys.php";

if (file_exists($key_file)) {
  $key_file = $config_dir."/keys_.php";
}

$template = "<?php\n\n";
$template .= "if (!isset(\$CONFIG))\n\t\$CONFIG = array();\n\n";

foreach($salts as $name => $salt) {
  $template .= "if (!isset(\$CONFIG['".$name."']))\n\t\$CONFIG['".$name."'] = '".$salt."';\n\n";
}

writeFile($key_file, $template);
