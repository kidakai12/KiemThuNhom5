/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;
import org.junit.runner.JUnitCore;
import org.junit.runner.Result;
import org.junit.runner.notification.Failure;

/**
 *
 * @author nguyen thanh sang
 */
public class TestRunner {
    
    public TestRunner() {
    }
    
    @BeforeClass
    public static void setUpClass() {
    }
    
    @AfterClass
    public static void tearDownClass() {
    }
    
    @Before
    public void setUp() {
    }
    
    @After
    public void tearDown() {
    }

    // TODO add test methods here.
    // The methods must be annotated with annotation @Test. For example:
    //
    // @Test
    // public void hello() {}
    public static void main(String[] args) {
        Result result=JUnitCore.runClasses(TestJunit.class,TestJunit1.class,TestNG.class);
        for (Failure fail: result.getFailures())
        {
            System.out.println(fail.toString());
        }
        System.out.println("Kết quả:" + result.wasSuccessful());
    }
}
