<?php
function validateCredentials($user, $pass) {
    
    
    if (($user === '1' && $pass === '123') || ($user === '2' && $pass === '256')){
        return true;
    }
    else {
        return false;
    }
}
?>
<?php

use PHPUnit\Framework\TestCase;

require_once 'student_login.php';

class LoginTest extends TestCase {
    public function testValidCredentials() {
        $user = '1';
        $pass = '123';

        $result = validateCredentials($user, $pass);

        $this->assertTrue($result);
    }
    public function testValidCredentials1() {
        $user = '2';
        $pass = '256';

        $result = validateCredentials($user, $pass);

        $this->assertTrue($result);
    }
   
}