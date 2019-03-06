<?php
/**
 *
 */

class CheckTLD
{
  private $psl_file;
  private $host;
  
  public function __construct($psl_file, $host = "")
  {
    $this->psl_file = $psl_file;
    $this->host = $host;
  }

  private function getPSLfile()
  {
    $psl_file = $this->psl_file;
    $fichier = file_get_contents($psl_file);
    return $fichier;
  }


  public function CheckTLD()
  {
    $psl_file = $this->getPSLfile();
    $host = $this->host;

    $verify = 0;


    // Shift the address to lowercase to simplify checking

    $host = strtolower($host);

    // Split the Address into user and domain parts

    $UD = explode("@", $host);

    if (sizeof($UD) <= 1) {
      $UD = explode(".", $host);
    }
    if (sizeof($UD) <= 1) {
      echo "Error";
    }


    // Split the domain into at least 2 parts
    $Domain = explode(".", $UD[1]);
    $sLevels = sizeof($Domain);
    if ($sLevels < 1) $verify = 1;
    // Get the TLD, strip off trailing ] } ) > and check the length

    $tld = $Domain[$sLevels - 1];

    if (strlen($tld) < 2 && $tld != "arpa") $verify = 1;

    if (preg_match_all('/\n'.$tld.'/', $psl_file, $resultat, PREG_PATTERN_ORDER) == FALSE) {
      $verify = 1;
    }

    if($verify == 0) {
      echo "TLD has been checked and is a valid host (BY TLD)";
    }
    else {
      echo "Host provided has not a valid TLD";
    }
  }  
}
 