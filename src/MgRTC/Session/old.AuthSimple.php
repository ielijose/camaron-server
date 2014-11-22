<?php

namespace MgRTC\Session;

use MgRTC\Session\AuthInterface;
use Ratchet\ConnectionInterface;
use MgRTC\Session\Database;
class AuthSimple extends AuthBase implements AuthInterface {

    /**
     * Find user
     * 
     * @param array $config
     * @param string $username
     * @param string $password
     * @return array|null
     */
    protected function _findUser($config,$username,$password){

       
    }

    

    /**
     * @param ConnectionInterface $conn
     * @param array $cookies
     * @return array
     */
    public function authUser(ConnectionInterface $conn, array $cookies) {
        if(isset ($conn->Config['simple'])){
            $config = $conn->Config['simple'];
        }
        else{
            $config = array('allowAnonim'   => true);
        }

        foreach ($cookies as $key => $c) {
            $cookies[$key] = urldecode($c);
        }

        $this->debug("Simple Autorization cookies:"); $this->debug($cookies);

        if(isset ($cookies['mgVideoChatSimpleUser']) && isset($cookies['mgVideoChatSimplePass'])){
            $user = $this->_findUser($config, $cookies['mgVideoChatSimpleUser'], $cookies['mgVideoChatSimplePass']);
            if(!$user){
                return null;
            }
            return array(
                'provider'      => 'simple',
                'id'            => $user['id'],
                'email'         => '',
                'name'          => $user['name']
            );
        }
                
        if(!$config['allowAnonim'] || !isset ($cookies['mgVideoChatSimple']) || !$cookies['mgVideoChatSimple']){
            return null;
        }
        return array(
            'provider'      => 'simple',
            'id'            => $conn->resourceId . '_a',
            'email'         => '',
            'name'          => urldecode($cookies['mgVideoChatSimple'])
        );
    }
}