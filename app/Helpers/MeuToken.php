<?php

namespace App\Helpers;

class MeuToken{

    private $yourKey;
    public $playload;

    public function __construct($secret_key, $payload_array){

        $this->yourKey = $secret_key;
        $this->payload = $payload_array;

    }



        public function createToken(){

            $key = $this->yourKey;
            $payload = $this->payload; //Get Array with Payload Vars set on objected defined
            $payload = json_encode($payload); //Define token payload to (JSON string)
            return $this->JWT($key,$payload);
        }


        public function verifyToken($token){

            //Regex to validate if $token is a valid JWT string
            if(!preg_match("/[a-zA-Z0-9\-_]+?\.[a-zA-Z0-9\-_]+?\.([a-zA-Z0-9\-_]+)$/",$token)){ return false; }

            //Decode Payload from JWT Token received to generate a new one with our $secret_key
            $payload_decode = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $token)[1]))),true);
            $payload = json_encode( $payload_decode );

            //Generate a new Token JWT based on Payload received with our secret_key
            $key = $this->yourKey;
            $verification = $this->JWT($key,$payload);


            //Verification
            if($token!=$verification){
                return false;   //Failed -> Token JWT received is different from Token JWT generated
            }else{
                return true;    //Success -> Token JWT is valid return TRUE
            }


        }


            //Function to Generate JWT Token (Encode / Decode) based on payload received
            public function JWT($key,$payload){

                // Define o token header
                $header = json_encode([ 'typ' => 'JWT', 'alg' => 'HS256' ]);
                //CreateToken and VerifyToken payloads
                $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
                $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
                $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $key, true);
                $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
                $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
                return $jwt;

            }



}
