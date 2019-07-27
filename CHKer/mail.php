<?php 

// Libpsl-PHP has the goal to provide an integration library for PSL in
// PHP.

// Copyright (C) 2019  Gomes Dias Julien

// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.

// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <https://www.gnu.org/licenses/>.
// See LICENSE file for more informations.

class Mail extends CheckTLD
{

  public $Addr;

  function __construct()
  {
    parent::__construct();
  }
  
  private function CheckAddress() {
    $Addr = $this->Addr;
    $result = (bool) 0;

    if (is_array($Addr)):
      $Addrs = array();
      for ($i = 1; $i < count($Addr); $i++) {
        $record = $Addr[$i];
        $result = getmxrr($record, $mx_records, $mx_weight); 
        $Addrs[] = [$record => $result];
        if ($result === 1) $nb_error = 1;
      }
    endif;
    if ($nb_error === 1) {
      return 1;
    }
  }
  
  public function main() {
    $a = CheckAddress();
    if (!$a) return 1;
  }
}



?>
