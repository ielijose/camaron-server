<?php
$config = array(
    'port'              => 8080,
    'debug'             => true,
    'allowedOrigins'    => null,
    'IpBlackList'       => null,
    'authAdapter'       => 'MgRTC\Session\AuthSimple',
    'facebook'          => array(
        'appId'         => '251017698383358',
        'secret'        => '0ee6bd094ef97478417ef9602232524d'
    ),
    'wordpress'         => array(
        'dir'           => '/data/projects/magnoliyan/rtc/trunk/source/client/demos/wordpress'
    ),
    'simple'            => array(
        'allowAnonim'   => true,
        'members'       => array(
            array('id' => 11, 'username' => 'operator1', 'password' => 'operator1', 'name'   => 'Tech Support'),
            array('id' => 12, 'username' => 'ielijose', 'password' => '2512', 'name'   => 'Eli Jose Carrasquero')

        )
    ),
    'operators'         => null,
    'allowDuplicates'   => true,    
    'rooms'             => array(
        1   => array(
            'authAdapter'   => 'MgRTC\Session\AuthSimple',
            'disableVideo'  => false,
            'disableAudio'  => false
        ),
        2   => array(
            'authAdapter'   => 'MgRTC\Session\AuthFacebook',
        ),
        3   => array(
            'authAdapter'   => 'MgRTC\Session\AuthWordpress',
        ),
        4   => array(
            'authAdapter'   => 'MgRTC\Session\AuthSimple',
            'operators'     => array(11)
        ),
        5   => array(                                                           
            'authAdapter'   => 'MgRTC\Session\AuthSimple',                      
            'group'         => true,                                            
            'limit'         => 3                                                
        ),                                                                      
        6   => array(                                                           
            'authAdapter'   => 'MgRTC\Session\AuthSimple',                      
            'roulette'      => true                                             
        ),                                                                      
        7   => array(                                                           
            'file'          => true,                                            
            'authAdapter'   => 'MgRTC\Session\AuthSimple'                       
        ),                                                                       
        'group_%'   => array(                                                           
            'authAdapter'   => 'MgRTC\Session\AuthSimple',                      
            'group'         => true,                                            
            'limit'         => 3                                                
        )
    )
);
