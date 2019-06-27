<?php

class Groupe
{	
	// Attributs
	private $_idgroup;
	private $_description;
	
    // Getters & Setters 
    public function getIdGroup()
	{
		return $this->_idgroup;
	}

	public function setIdGroup($_idgroup)
	{
		$this->_idgroup = $_idgroup;
		return $this;
    }
    
	public function getDescription()
	{
		return $this->_description;
	}

	public function setDescription($_description)
	{
		$this->_description = $_description;
		return $this;
	}
  

    // Construct & hydrate
	public function __construct(array $options = [])
	{ 
		if (!empty($options))
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			
			if (is_callable([$this, $method]))
			{
				$this->$method($value);
			}
		}
	}
}

?>