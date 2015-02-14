<?php

namespace MgRTC\Session;

use MgRTC\Session\AuthInterface;
use Ratchet\ConnectionInterface;

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
        $conex = mysql_pconnect("localhost", "grupopre_inmobi", "QQ4pNZf424J(") or trigger_error(mysql_error(),E_USER_ERROR); 
        mysql_select_db("grupopre_inmobi", $conex);
        $query = "SELECT * FROM operators";
        $operators = mysql_query($query, $conex) or die(mysql_error());
        $row_operators = mysql_fetch_assoc($operators);

        do {
           $this->debug($row_operators['username'] ."  ==  ". $username . "  >> " .($row_operators['username'] == $username));

            if($row_operators['username'] == $username && $row_operators['password'] == $password){
                $this->debug("ENTRO AQUI");
                $u = array(
                    'id'        => $row_operators['id'],
                    'username'  => $row_operators['username'],
                    'password'  => $row_operators['password'],
                    'name'      => $row_operators['full_name']
                );
                $this->debug(json_encode($u));
                return $u;
            }
        } while ($row_operators = mysql_fetch_assoc($operators));    
        $this->debug("DIO NULL");    
        return null;        
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
                'name'          => $user['name'],
                'operator'      => true
            );
        }
                
        if(!$config['allowAnonim'] || !isset ($cookies['mgVideoChatSimple']) || !$cookies['mgVideoChatSimple']){
            return null;
        }
        $this->debug("RETORNO LO QUE ERA");
        return array(
            'provider'      => 'simple',
            'id'            => $conn->resourceId . '_a',
            'email'         => '',
            'name'          => urldecode($cookies['mgVideoChatSimple'])
        );
    }
}
