<?php
/**
 *
 */
class CheckTLD
{

  private $_pslfile;
  private $_filetopath = "./";

  function __construct($psl_file, $tld="", $host="")
  {
   $psl_file;
   $rbl;
   $host;
 }

  public function getPSLfile(){
      $psl_file = $this->_psl_file;
      $psl_file = "public_suffix_list.dat";
      $fichier = file_get_contents($psl_file);
      return $fichier;
  }


  public function CheckTLD($psl_file, $tld, $host){
    $psl_file = $this->psl_file;
    $host = $this->host;
    $tld = $this->tld;

    $psl_file = "public_suffix_list.dat";
    $fichier = file_get_contents($psl_file);

    $verify = 0;

    // Shift the address to lowercase to simplify checking

    $Addr = strtolower($Addr);

    // Split the Address into user and domain parts

    $UD = explode("@", $Addr);

    if (sizeof($UD) != 2) {
      $UD = explode(".", $Addr);
    }
    if (sizeof($UD) != 2) {
      echo "Error";
    }

    // Split the domain into at least 2 parts
    $Domain = explode(".", $UD[1]);
    $sLevels = sizeof($Domain);

    if ($sLevels < 2) $verify = 1;

    // Get the TLD, strip off trailing ] } ) > and check the length

    $tld = $Domain[$sLevels-1];

    if (strlen($tld) < 2 && $tld != "arpa") $verify = 1;

    if(preg_match_all('/\n'.$tld.'\n/', $fichier, $resultat, PREG_PATTERN_ORDER) == FALSE)  {
      $verify = 1;
    }



    if (preg_match($dtld, $tld)) {
      return $verify = 0;
    } else {
      return $tldfail = 5;
    }
  }

}



?>
