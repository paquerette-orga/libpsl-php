<?php


namespace PSL\Interfaces\RequestInterface;
use PSL\Utils\File\File;


interface RequestInterface
{
	public static function downloadPSLFile($file): File;




}