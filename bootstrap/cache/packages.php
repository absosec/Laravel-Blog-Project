<?php return array (
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'php-flasher/flasher-laravel' => 
  array (
    'aliases' => 
    array (
      'Flasher' => 'Flasher\\Laravel\\Facade\\Flasher',
    ),
    'providers' => 
    array (
      0 => 'Flasher\\Laravel\\FlasherServiceProvider',
    ),
  ),
  'yoeunes/toastr' => 
  array (
    'aliases' => 
    array (
      'Toastr' => 'Yoeunes\\Toastr\\Facades\\Toastr',
    ),
    'providers' => 
    array (
      0 => 'Yoeunes\\Toastr\\ToastrServiceProvider',
    ),
  ),
);