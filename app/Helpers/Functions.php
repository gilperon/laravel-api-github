<?php

namespace App\Helpers;

//Store JWT Token
function storeToken($get_token){


    //IMPORTANT >> AutoDetect if user is on localhost, if(localhost=1) so disable attribute Secure on cookie (more info Read Item 2.)
    //Posso detectar tbm IF conexao é HTTPS, e retornar uma msg de erro nessa funcao, dizendo que o cookie precisa ser setado atraves de uma pagina HTTPS
    //if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443){ echo "conexao segura"; }else{ "set false to Secure to work in http" }
    $localhost = ($_SERVER['REMOTE_ADDR']=="127.0.0.1") ? 1 : 0 ;


    /* 1.
    *  Set the cookie by setcookie() or header() do the same thing
    *  However using setcookie() made it easier since the function natively convert time() to supported cookie time format and keep updated for updates from php community
    *  For older PHP version, this script is setting cookie by header() , to support samesite attribute
    */


        /* 2. $ck_secure
        *  Attention the cookie will NOT working in localhost since we set the attribute Secure; on cookies
        *  If Secure; is defined or true, Script can not create a cookie via insecure layer (HTTP) not even cookies will be sent through this protocol (http)
        *  To work on localhost - if PHP>7 set 'secure' => false on setcookie() or PHP<7 delete Secure; on header(); so cookies will work on localhost http
        */


            $ck_name = "token"; //Cookie Name = Cookie['token']
            $ck_value = $get_token; //Cookie Value = JWT Generated Token
            $ck_domain = (substr($_SERVER['HTTP_HOST'], 0, 4) == 'www.') ? substr($_SERVER['HTTP_HOST'], 4) : $_SERVER['HTTP_HOST'] ; //Remove www. to trigger all subdomains

            if (PHP_VERSION_ID >= 70300) { //For PHP >= v7.3 -> You can use the $options array to set the samesite value

                $ck_secure = ($localhost) ? false : true ; // <<< If $localhost=1 disable attribute Secure

                setcookie($ck_name, $ck_value, [
                    'expires' => time() + (86400*30), //Cookie Expire in 30 days
                    'domain' => $ck_domain,  //If a domain is specified, then subdomains are always included.
                    'path' => '/',
                    'secure' => $ck_secure, //True = Cookie will be sent only over HTTPS connections (HTTP will not get the cookie)
                    'httponly' => true, //True = cookie can not be read by js (protection xxs)
                    'samesite' => 'Lax', //Lax - cookie will be only sent on GET or link requests, (POST, PUT, Ajax, Iframe will not get the cookie) (protection csrf)
                ]);


            }else{ //For older PHP versions create a cookie using header() to enable support samesite attribute
                //Cookie Expire in 30 days - Expires on header should use gmdate(DATE_COOKIE) so we convert time() to time supported cookie (setcookie do it natively)
                $ck_expire = "expires=".gmdate(DATE_COOKIE , strtotime( '+30 days' ));
                $ck_domain = "domain=".$ck_domain;
                $ck_path = "path=/";
                $ck_secure = ($localhost) ? "" : "Secure;" ; // <<< If $localhost=1 remove attribute Secure to work in http
                header("Set-Cookie: {$ck_name}={$ck_value}; {$ck_expire}; {$ck_domain}; {$ck_path}; {$ck_secure} HttpOnly; SameSite=Lax ",false); //false: not overwrite cookie


            }





}
