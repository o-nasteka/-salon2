<?php

Config::set('site_name', 'Салон солнцезащитных систем');

Config::set('languages', array('en', 'fr'));

// Routes. Route name => method prefix
Config::set('routes', array(
    'default' => '',
    'admin'   => 'admin_',
));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');

Config::set('db.host', 'nasteka.mysql.ukraine.com.ua');
Config::set('db.user', 'nasteka_salon');
Config::set('db.password', '7w87p3rj');
Config::set('db.db_name', 'nasteka_salon');

Config::set('salt', 'jd7sj3sdkd964he7e');

// comments