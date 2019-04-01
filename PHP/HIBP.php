<?php
class HIBP
{
    private $source;
    
    public function __construct($source) {
        $this->source = $source;
    }
    
    public function checkEmail($email, $truncate = false)
    {
        $url = sprintf('https://haveibeenpwned.com/api/v2/breachedaccount/%s' . ($truncate ? '?truncateResponse=true' : ''), $email);
        
        $options = array(
            'https' => array(
                'method' => "GET",
                'header' => "Accept-language: en",
                'User-Agent' => "Breach-Checker-For-" . str_replace(" ", "-", $this->source) 
            )
        );
        
        $context = stream_context_create($options);
        $response = json_decode(file_get_contents($url, false, $context));

        sleep(1);

        if (!empty($response)) {
            return $response;
        } else {
            return false;
        }
    }
    
    public function __destruct() {}
}