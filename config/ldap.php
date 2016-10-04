<?php

return [
    'UkLdap' => [
        'loginConstraintChecker' => function($ldapuser, $controller) {
            // check if user has correct role
            if (in_array('Student', $ldapuser['eduPersonAffiliation']) 
            ||  in_array('Staff', $ldapuser['eduPersonAffiliation'])) {
                // check if useraccount is not secondary
                if(!in_array('Sekundäraccount', $ldapuser['workforceID']))
                    // authed
                    return true;
                else
                    $controller->Flash->error(__('Sie können sich nur mit ihrem Primäraccount anmelden.'));
            } else
                $controller->Flash->error(__('Nur Studenten und Mitarbeiter haben die Möglichkeit sich einen Account auszuleihen.'));
        }
    ],
     /**
     * LDAP Configuration.
     *
     * Contains an array of settings to use for the LDAP configuration.
     *
     * ## Options
     *
     * - `domain` - The domain name to match against or auto complete so user isn't
     *    required to enter full email address
     * - `host` - The domain controller hostname. This can be a closure or a string.
     *    The closure allows you to modify the rules in the configuration without the
     *    need to modify the LDAP plugin. One host (string) should be returned when
     *    using closure.
     * - `baseDN` - The base DN for directory - Closure must be used here, the plugin
     *    is expecting a closure object to be set.
     * - `search` - The attribute to search against. Usually 'UserPrincipalName'
     * - `port` - The port to use. Default is 389 and is not required.
     * - `errors` - Array of errors where key is the error and the value is the error
     *    message. Set in session to Flash.ldap for flashing
     *
     * @link http://php.net/manual/en/function.ldap-search.php - for more info on ldap search
     */
    'Ldap' => [
        'host' => 'ldap.its.uni-kassel.de',
        'port' => 389,
        'search' => 'uid',
        'baseDN' => function($username, $domain) {
            $baseDN = "cn=".$username.", ou=active, ou=users, o=unikassel";
            return $baseDN;
        },
        'bindDN' => function($username, $domain) {
            $bindDN = "cn=".$username.", ou=active, ou=users, o=unikassel";
            return $bindDN;
        },
        'errors' => [
            'data 773' => 'Some error for Flash',
            'data 532' => 'Some error for Flash',
        ]
    ],
];