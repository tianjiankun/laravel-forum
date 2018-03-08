<?php return array (
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
  'overtrue/laravel-wechat' => 
  array (
    'providers' => 
    array (
      0 => 'Overtrue\\LaravelWeChat\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'EasyWeChat' => 'Overtrue\\LaravelWeChat\\Facade',
    ),
  ),
  'ucar/push' => 
  array (
    'providers' => 
    array (
      0 => 'Ucar\\Push\\Providers\\JPushServiceProvider',
      1 => 'Ucar\\Push\\Providers\\SmsServiceProvider',
    ),
    'aliases' => 
    array (
      'PhpSms' => 'Toplan\\PhpSms\\Facades\\Sms',
    ),
  ),
);