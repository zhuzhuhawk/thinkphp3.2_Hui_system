<?php


/**
 * Skeleton subclass for representing a row from the 'bp_cases' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Ezer_PropelCase extends BaseEzer_PropelCase implements Ezer_IntCase
{
	/**
	 * @var Ezer_PropelCaseData
	 */
	protected $dataObject = null;
	

	public function __construct()
	{
		parent::__construct();
		$this->dataObject = new Ezer_PropelCaseData();
		$this->setExcutionRepeats(1);
		$this->setExcutionInterval(0);
		$this->setNextExcutionTime(0);
		$this->setCurrentExcutionIndex(0);
	}
	
	/**
	 * @return string
	 */
	public function getProcessIdentifier()
	{
		return $this->getId();
	}
	
	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		parent::hydrate($row, $startcol, $rehydrate);
		
		$data = $this->getData();
		if($data)
			$this->dataObject = unserialize($this->getData());
	}

	/**
	 * Code to be run before persisting the object
	 * @param PropelPDO $con
	 * @return bloolean
	 */
	public function preSave(PropelPDO $con = null)
	{
		if($this->dataObject)
			$this->setData(serialize($this->dataObject));
			
		return true;
	}
	
	/**
	 * @return array<Ezer_Variable>
	 */
	public function getVariables()
	{
		return $this->dataObject->getVariables();
	}
	
	public function setVariables(array $variables)
	{
		$this->dataObject->setVariables($variables);
	}
	
	public function incrementExcutionIndex()
	{
		$this->setCurrentExcutionIndex($this->getCurrentExcutionIndex() + 1);
	}
	
} // Ezer_PropelCase
