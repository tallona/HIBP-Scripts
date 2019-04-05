Class HIBP
{
    [string]$source
    [string]$email
    [object]$headers

    HIBP([string]$source, [string]$email)
    {
        $this.source = $source
        $this.email = $email

        $this.headers = New-Object "System.Collections.Generic.Dictionary[[String],[String]]"
    }

    [object] checkEmail()
    {
        $url = "https://haveibeenpwned.com/api/v2/breachedaccount/$($this.email)"
        $userAgent = "Breach-Checker-For-$($this.source)"
        $this.headers.Add("Accept-language", "en");

        $response = Invoke-RestMethod -Uri $url -Method Get -UserAgent $userAgent -Headers $this.headers
        
        return $response
    }
}