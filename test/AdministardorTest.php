<?php
 namespace App\Test;
 use App\AdministradorModel;
 use PHPUnit\Framework\TestCase;
 require_once "config/database.php";

class AdministardorTest extends TestCase{
    public function testdeindexadmin(){
        $Prueba = new AdministradorModel;
        $this->assertEquals($Prueba->get_pacientes());
    }
}

 ?>       