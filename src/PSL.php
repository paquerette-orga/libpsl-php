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

namespace PSL;
use \PSL\Interfaces\PSLInterface\PSLInterface;

class PSL implements PSLInterface
{
  private $psl_file;
  private $host;

  /**
   * __construct (initialisé avec les arguments suivants)
   *
   * @param  string $psl_file
   * @param  string $host
   *
   */
  public function __construct($psl_file, $host = "")
  {
    $this->psl_file = $psl_file;
    $this->host = $host;
  }

  /**
   * Get the PSL file
   *
   * @return string $fichier (Content of the file)
   */
  private function getPSLfile(): string
  {
    $psl_file = $this->psl_file;
    $fichier = file_get_contents($psl_file);
    return $fichier;
  }


	/**
	 * Main function of the library : Check if the TLD of a domain or mail adress is in PSL Database.
	 *
	 * @return int (0 if tld is in the PSP DB; 1 if not)
	 * or
	 */
  public function check(): int
  {
    $psl_file = $this->getPSLfile();
    $host = $this->host;

    $verify = 0;
    $pverify = 1;
    $prefix = "";


    // Shift the address to lowercase to simplify checking

    $host = strtolower($host);

    // Split the Address into user and domain parts

    $Domain = explode("@", $host);
    $Domain = explode(".", $host);
    if (sizeof($Domain) <= 1) {
      echo "Error";
    }

    // Split the domain into at least 2 parts
    //$Domain = explode(".", $UD[$size - 1]);
    $sLevels = sizeof($Domain);
    if ($sLevels < 1) $verify = 1;

    // Get the TLD, strip off trailing ] } ) > and check the length

    $tld = $Domain[$sLevels - 1];
    echo $tld;

    // Case the TLD is a prefix (more than 3 part)
    if ($sLevels > 1) {
      $prefix = $Domain[$sLevels - 2].".".$Domain[$sLevels - 1];
      if ($prefix) {
        $pverify = 0;
      }
    }

    if (strlen($tld) < 2 && $tld != "arpa") $verify = 1;

    if (preg_match_all('/\n'.$tld.'/', $psl_file, $resultat, PREG_PATTERN_ORDER) == FALSE) {
      $verify = 1;
    }

    if (preg_match_all('/\n'.$prefix.'/', $psl_file, $resultat, PREG_PATTERN_ORDER) == FALSE) {
      $pverify = 1;
    }

    return $pverify;
  }
}
 