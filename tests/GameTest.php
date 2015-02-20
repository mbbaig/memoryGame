<?php
require_once("src/Game.php");
class GameTest extends PHPUnit_Framework_TestCase
{
  public $game;

  /**
   * Setup main object for testing
   */
  public function setUp()
  {
    $this->game = new Game();
  }

  /**
   * Test getter method for the Rows
   */
  public function testGetRows()
  {
    $this->assertEquals(4, $this->game->getRows());
  }

  /**
   * Test getter method for the Columns
   */
  public function testGetCols()
  {
    $this->assertEquals(6, $this->game->getCols());
  }

  /**
   * Test if the IDs of the images passed in match
   */
  public function testCheckIdsMatch()
  {
    $match = $this->game->checkIds(16, 4);

    $this->assertEquals("match", $match);
  }

  /**
   * Test the behavior if they don't match
   */
  public function testCheckIdsMiss()
  {
    $miss = $this->game->checkIds(10, 3);

    $this->assertEquals("miss", $miss);
  }

  /**
   * Test if the method can successfully accept 
   * data in different formats
   */
  public function testCheckIdsFormat()
  {
    $match = $this->game->checkIds("12", "0");

    $this->assertEquals("match", $match);
  }

  /**
   * Test if the method can accept data that
   * out of order and produce the right result
   */
  public function testCheckIdsDescendingOrder()
  {
    $match = $this->game->checkIds(5, 17);

    $this->assertEquals("match", $match);
  }
}