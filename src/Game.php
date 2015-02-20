<?php

class Game
{
  const NUMBER_OF_ROWS = 4;
  const NUMBER_OF_COLS = 6;

  private $grid_ids = array(
    0 => array('0', '1', '2', '3', '4', '5'),
    1 => array('6', '7', '8', '9', '10', '11'),
    2 => array('12', '13', '14', '15', '16', '17'),
    3 => array('18', '19', '20', '21', '22', '23')
  );

  /**
   * Return the number of rows
   * @return mixed
   */
  public function getRows()
  {
  	return self::NUMBER_OF_ROWS;
  }

  /**
   * Return the number of columns
   * @return mixed
   */
  public function getCols()
  {
  	return self::NUMBER_OF_COLS;
  }

  /**
   * Returns a fully formated grid of images.
   * @return string
   */
  public function getGrid()
  {
  	$table = "<table class='table-bordered'>\n";
  	for ($i=0; $i < $this->getRows(); $i++) { 
      shuffle($this->grid_ids[$i]);                     // Shuffles the grid
  		
      $table .= "<tr>\n";
  		for ($j=0; $j < $this->getCols(); $j++) {

  			$table .= "<td><img class='blank'" .
          " id='" . $this->grid_ids[$i][$j] . 
          "' src='images/" . $this->grid_ids[$i][$j] .  // Creates the HTML grid
          ".png' alt='" . $this->grid_ids[$i][$j] . 
          "'></td>\n";

  		}
  		$table .= "</tr>\n";
  	}
  	$table .= "</table>\n";

  	return $table;
  }

  /**
   * Checks if the numbers subtract to equal
   * 12. Then returns the status "match". 
   * Otherwise returns "miss".
   * @return string
   */
  public function checkIds($id1, $id2)
  {
    $id1 = intval($id1);
    $id2 = intval($id2);

    $largerId = max($id1, $id2);
    $smallerId = min($id1, $id2);

    $match = $largerId - $smallerId;                    // If $match equals 12. The cards are the same.

    if ($match == 12) {
      return "match";
    } else {
      return "miss";
    }
  }
}
