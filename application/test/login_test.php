<?php

class login_test extends TestCase{
  public function test_index(){
    $output = $this->request(http_method:'GET' , argv:'login/index');
    $this->assertContains(
      needle:'',$output
    );
  }
}
