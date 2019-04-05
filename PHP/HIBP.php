<?php
class HIBP
{
    private $source;
    
    public function __construct($source) {
        $this->source = $source;
    }
    
    public function checkEmail($email)
    {
        $url = sprintf('https://haveibeenpwned.com/api/v2/breachedaccount/%s', $email);

        $curl = curl_init();
        
        curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => "Breach-Checker-For-" . $this->source,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => FALSE
            ]
        );
        
        $response = curl_exec($curl);
        curl_close($curl);
        
        sleep(1);

        if (!empty($response)) {
            return $response;
        } else {
            return false;
        }
    }
    
    public function __destruct() {}
}