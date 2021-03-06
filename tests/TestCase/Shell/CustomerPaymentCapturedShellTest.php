<?php
namespace App\Test\TestCase\Shell;

use App\Shell\CustomerPaymentCapturedShell;
use Cake\TestSuite\TestCase;

/**
 * App\Shell\CustomerPaymentCapturedShell Test Case
 */
class CustomerPaymentCapturedShellTest extends TestCase
{

    /**
     * ConsoleIo mock
     *
     * @var \Cake\Console\ConsoleIo|\PHPUnit_Framework_MockObject_MockObject
     */
    public $io;

    /**
     * Test subject
     *
     * @var \App\Shell\CustomerPaymentCapturedShell
     */
    public $CustomerPaymentCaptured;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->getMockBuilder('Cake\Console\ConsoleIo')->getMock();
        $this->CustomerPaymentCaptured = new CustomerPaymentCapturedShell($this->io);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomerPaymentCaptured);

        parent::tearDown();
    }

    /**
     * Test getOptionParser method
     *
     * @return void
     */
    public function testGetOptionParser()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test main method
     *
     * @return void
     */
    public function testMain()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
