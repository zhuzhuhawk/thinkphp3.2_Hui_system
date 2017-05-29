<?php


/**
 * Skeleton subclass for representing a row from the 'bp_scopes' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Ezer_PropelElseInstance extends Ezer_PropelStepContainerInstance implements Ezer_IntElseInstance 
{
	public function __construct()
	{
		parent::__construct();
		$this->dataObject = new Ezer_PropelElseInstanceData();
		$this->setType(Ezer_IntStep::STEP_TYPE_ELSE);
	}
}
