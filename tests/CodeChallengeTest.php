<?php
// Reggister namespace Begin
namespace ngotulan\codechallenge;
// Reggister namespace End

// Reggister extension Begin
use PHPUnit\Framework\TestCase;
// Reggister extension End

require __DIR__ . "/../src/CodeChallenge.php";

final class CodeChallengeTest extends TestCase{
    // Test Case Class Constructor
    public function testClassConstructor()
    {
        /**
        * @param string    $schedules
        * @param int       $n
        */     
        $schedules="1 1 1 1 1 0 0 1 1 1 1 1 0 0";
        $n=14;
        $codeChallenge = new CodeChallenge("1 1 1 1 1 0 0 1 1 1 1 1 0 0", 14);
        $this->assertEquals($schedules, $codeChallenge->schedules);
        $this->assertSame($n, $codeChallenge->n);        
    }

    public function testClassConstructorFromFile_TestCase1()
    {
        /**
        * @param string    $schedules
        * @param int       $n
        */     
        $schedules="1 1 1 1 1 0 0 1 1 1 1 1 0 0";
        $n=14;
        // Test Function Load From File Begin
        $codeChallenge = new CodeChallenge();        
        $codeChallenge->initDataFromFile("test_case_files/test_case_01.txt");
        $this->assertEquals($schedules, $codeChallenge->schedules); 
        $this->assertSame($n, $codeChallenge->n);// Must be int and Equal
        // Test Function Load From File End
        /**
        * @param array     $expectedNumber
        */        
        $expectedNumber=14;
        // Test Class  Function Find Solution Begin
        $this->assertSame($expectedNumber, $codeChallenge->find_solution($codeChallenge->n,$codeChallenge->schedules));        
        // Test Class  Function Find Solution End
    }

    public function testClassConstructorFromFile_TestCase2()
    {
        /**
        * @param string    $schedules
        * @param int       $n
        */     
        $schedules="1 0 1 1 1 1 1 1 0";
        $n=9;        
        // Test Function Load From File Begin
        $codeChallenge = new CodeChallenge();        
        $codeChallenge->initDataFromFile("test_case_files/test_case_02.txt");
        $this->assertEquals($schedules, $codeChallenge->schedules); 
        $this->assertSame($n, $codeChallenge->n);// Must be int and Equal
        // Test Function Load From File End
        /**
        * @param array     $expectedNumber
        */        
        $expectedNumber=0;
        // Test Class  Function Find Solution Begin
        $this->assertSame($expectedNumber, $codeChallenge->find_solution($codeChallenge->n,$codeChallenge->schedules));        
        // Test Class  Function Find Solution End
    }

    // Test Case 1
    public function testClassFunctionFindSolutionTestCase1()
    {
       /**
        * @param string    $schedules
        * @param int       $n
        */     
        $schedules="1 1 1 1 1 0 0 1 1 1 1 1 0 0";
        $n=14;
        $codeChallenge = new CodeChallenge($schedules,$n);
        $expectedNumber=14;
        // Test Class  Function Find Solution Begin
        $this->assertSame($expectedNumber, $codeChallenge->find_solution($codeChallenge->n,$codeChallenge->schedules));        
        // Test Class  Function Find Solution End
    }
    // Test Case 2
    public function testClassFunctionRotLeftTestCase2()
    {
       /**
        * @param string    $schedules
        * @param int       $n
        */     
        $schedules="1 0 1 1 1 1 1 1 0";
        $n=9;
        $codeChallenge = new CodeChallenge($schedules, $n);
        $expectedNumber=0;
        // Test Class  Function Find Solution Begin
        $this->assertSame($expectedNumber, $codeChallenge->find_solution($codeChallenge->n,$codeChallenge->schedules));        
        // Test Class  Function Find Solution End
    }
}
