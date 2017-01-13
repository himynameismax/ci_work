<title>LDAP</title>

<?php
$ldap_password = 'root';
$ldap_username = 'cn=admin,dc=nkmz,dc=plant';
$ldap_connection = ldap_connect('192.168.100.203');

// Вот это параметры для поиска по Active Directory, просто в LDAP может быть по другому.
ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.

if (TRUE === ldap_bind($ldap_connection, $ldap_username, $ldap_password)) {

  $ldap_base_dn = "OU=User,DC=nkmz,DC=plant";
  $search_filter = '(objectClass=posixAccount)';
  $attributes = array();
  $attributes[] = 'givenname';
  $attributes[] = 'mail';
  $attributes[] = 'samaccountname';
  $attributes[] = 'sn';
  $attributes[] = 'telephoneNumber' ;
  $attributes[] = 'description' ;
  $attributes[] = 'title' ;
  $attributes[] = 'department' ;
  $attributes[] = 'physicalDeliveryOfficeName' ;
  $attributes[] = 'displayName' ;
  $attributes[] = 'userAccountControl' ;
  $attributes[] = 'ou' ;
  $result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter, $attributes);
// Если нужно сортируем
  ldap_sort($ldap_connection, $result, 'displayName');
  $entries = ldap_get_entries($ldap_connection, $result);
}

  for ($x=0; $x<$entries['count']; $x++) {

    $mail = array_key_exists('mail', $entries[$x]) ? trim($entries[$x]['mail'][0]) : '' ;

    $name = array_key_exists('givenname', $entries[$x]) ? trim($entries[$x]['givenname'][0]) : '' ;
    $fam = array_key_exists('sn', $entries[$x]) ? trim($entries[$x]['sn'][0]) : '' ;

    $phone = array_key_exists('telephonenumber', $entries[$x]) ? trim($entries[$x]['telephonenumber'][0]) : '' ;
    $title = array_key_exists('title', $entries[$x]) ? trim($entries[$x]['title'][0]) : '' ;

    $desc = array_key_exists('description', $entries[$x]) ? trim($entries[$x]['description'][0]) : '' ;

    $otd = array_key_exists('department', $entries[$x]) ? trim($entries[$x]['department'][0]) : '' ;
    $office = array_key_exists('physicaldeliveryofficename', $entries[$x]) ? trim($entries[$x]['physicaldeliveryofficename'][0]) : '' ;
    $full_name = array_key_exists('displayname', $entries[$x]) ? trim($entries[$x]['displayname'][0]) : '' ;

    $dn = array_key_exists('dn', $entries[$x]) ? trim($entries[$x]['dn']) : '' ;

//Выводим то, что нужно
  echo "$full_name";
  }
?>