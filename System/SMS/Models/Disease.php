<?php
class Disease{
	
	private $DiseaseID, $DiseaseName, $Causes, $Symptoms, $Description, 
	$Treatment1,$Treatment2,$Treatment3, $BodyArea;
	
	public function __construct($DisID, $DisName, $C, $Symp, $SympDesc, $Treat1,$Treat2,$Treat3, $BArea)
	{
		$this->DiseaseID = $DisID;
		$this->DiseaseName = $DisName;
		$this->Causes= $C;
		$this->Symptoms = $Symp;
		$this->Description = $SympDesc;
		$this->Treatment1 = $Treat1;
		$this->Treatment2 = $Treat2;
		$this->Treatment3 = $Treat3;
		$this->BodyArea = $BArea;
	}
	

	public function getDiseaseID(){
		return $this->DiseaseID;
	}
	
	public function getDiseaseName(){
		return $this->DiseaseName;
	}
	
	public function getCauses(){
		return $this->Causes;
	}
	
	public function getSympton(){
		return $this->Symptoms;
	}
	
	public function getDescription(){
		return $this->Description;
	}
	
	public function getTreatment1(){
		return $this->Treatment1;
	}

	public function getTreatment2(){
		return $this->Treatment2;
	}

	public function getTreatment3(){
		return $this->Treatment3;
	}
	
	public function getBodyArea(){
		return $this->BodyArea;
	}

}
?>