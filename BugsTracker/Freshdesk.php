<?php
class Freshdesk{
    
	protected $username;
	protected $password;
	protected $comp_name;
	
	function setUsername($username){
		$this->username=$username;	
	}
	function setPwd($pwd){
		$this->password=$pwd;	
	}
  function setCompName($comp_name){
		$this->comp_name=$comp_name;	
	}
function FreshdeskRestCall($urlMinusDomain, $method, $postData = '',$debugMode=false) {
        $url = "http://".$this->comp_name.".freshdesk.com$urlMinusDomain";

        //print "REST URL: " . $url . "\n";
        $header[] = "Content-type: multipart/form-data";
        $ch = curl_init ($url);

        if( $method == "POST") {
            if( empty($postData) ){
                $header[] = "Content-length: 0"; // <-- seems to be unneccessary to specify this... curl does it automatically
            }
            curl_setopt ($ch, CURLOPT_POST, true);
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $postData);
        }
		else if( $method == "PUT" ) {
            curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "PUT" );
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $postData);
        }
		else if( $method == "DELETE" ) {
			curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "DELETE" ); // UNTESTED!
		}
        else {
            curl_setopt ($ch, CURLOPT_POST, false);
        }
		$API_USR = $this->username;
		$API_PWD =$this->password;
        curl_setopt($ch, CURLOPT_USERPWD, "{$API_USR}:{$API_PWD}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		/*
        if( !empty($this->proxyServer) ) {
            curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1:8888');
        }
		*/

        $verbose = ''; // set later...
        if( $debugMode ) {
            // CURLOPT_VERBOSE: TRUE to output verbose information. Writes output to STDERR,
            // or the file specified using CURLOPT_STDERR.
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            $verbose = fopen('php://temp', 'rw+');
            curl_setopt($ch, CURLOPT_STDERR, $verbose);
        }

        $httpResponse = curl_exec ($ch);

        if( $debugMode ) {
            !rewind($verbose);
            $verboseLog = stream_get_contents($verbose);
            print $verboseLog;
        }


        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //curl_close($http);
        if( !preg_match( '/2\d\d/', $http_status ) ) {
            //print "ERROR: HTTP Status Code == " . $http_status . " (302 also isn't an error)\n";
        }


        if( $httpResponse == "You have exceeded the limit of requests per hour" ) {
            error_log("ERROR: Rate limit exceeded.");
        }

        // print "\n\nREST RESPONSE: " . $httpResponse . "\n\n";
        $lastHttpResponseText = $httpResponse;

        return $httpResponse;
    }
}