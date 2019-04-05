Import-Module -Force './HIBP.ps1'

[string]$source = "Source Name"
[string]$email = "name@email.com"

$hibp = [HIBP]::new($source, $email)

$hibp.checkEmail()