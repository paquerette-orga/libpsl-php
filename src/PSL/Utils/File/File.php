<?php


namespace PSL\Utils\File;
use PSL\Utils\File\FileInterface;

class File implements FileInterface
{
	private $name;
	private $lastModification;
	private $creationDate;
	private $sha;
	private $path;


	public function shaIser():string  {
		$this->sha = sha1_file($this->path);
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return File
	 */
	public function setName( $name )
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLastModification()
	{
		return $this->lastModification;
	}

	/**
	 * @param mixed $lastModification
	 * @return File
	 */
	public function setLastModification( $lastModification )
	{
		$this->lastModification = $lastModification;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreationDate():string
	{
		return $this->creationDate;
	}

	/**
	 * @param mixed $creationDate
	 * @return File
	 */
	public function setCreationDate( $creationDate ):void
	{
		$this->creationDate = $creationDate;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSha():string
	{
		return $this->sha;
	}

	/**
	 * @param mixed $sha
	 * @return File
	 */
	public function setSha( $sha ):void
	{
		$this->sha = $sha;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPath():string
	{
		return $this->path;
	}

	/**
	 * @param mixed $path
	 * @return File
	 */
	public function setPath( $path ):void
	{
		$this->path = $path;
		return $this;
	}


}