<?php
namespace Braspag\API;

class FraudAnalysis implements \JsonSerializable
{
    const FRAUDANALYSISSEQUENCE_ANALYSE_FIRST = 'AnalyseFirst';
    const FRAUDANALYSISSEQUENCE_AUTHORIZE_FIRST = 'AuthorizeFirst';
    
    const FRAUDANALYSISSEQUENCECRITERIA_ONSUCCESS = 'OnSuccess';
    const FRAUDANALYSISSEQUENCECRITERIA_ALWAYS = 'Always';
    
    private $sequence;
    private $sequenceCriteria;
    private $captureOnLowRisk;
    private $voidOnHighRisk;
    private $fingerPrintId;
    private $browser;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    public function populate(\stdClass $data)
    {
        $this->sequence = isset($data->sequence)? $data->sequence: null;
        $this->sequenceCriteria = isset($data->sequenceCriteria)? $data->sequenceCriteria: null;
        $this->captureOnLowRisk = isset($data->captureOnLowRisk)? !!$data->captureOnLowRisk: false;
        $this->voidOnHighRisk = isset($data->voidOnHighRisk)? !!$data->voidOnHighRisk: false;
        $this->fingerPrintId = isset($data->fingerPrintId)? $data->fingerPrintId: null;  
        
        if (isset($data->Browser)) {
            $this->browser = new Browser();
            $this->browser->populate($data->Browser);
        }
    }

    public function getSequence()
    {
        return $this->sequence;
    }

    public function getSequenceCriteria()
    {
        return $this->sequenceCriteria;
    }

    public function getCaptureOnLowRisk()
    {
        return $this->captureOnLowRisk;
    }

    public function getVoidOnHighRisk()
    {
        return $this->voidOnHighRisk;
    }

    public function getFingerPrintId()
    {
        return $this->fingerPrintId;
    }

    public function getBrowser()
    {
        return $this->browser;
    }

        public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    public function setSequenceCriteria($sequenceCriteria)
    {
        $this->sequenceCriteria = $sequenceCriteria;
        return $this;
    }

    public function setCaptureOnLowRisk($captureOnLowRisk)
    {
        $this->captureOnLowRisk = $captureOnLowRisk;
        return $this;
    }

    public function setVoidOnHighRisk($voidOnHighRisk)
    {
        $this->voidOnHighRisk = $voidOnHighRisk;
        return $this;
    }

    public function setFingerPrintId($fingerPrintId)
    {
        $this->fingerPrintId = $fingerPrintId;
        return $this;
    }
    
    public function setBrowser(Browser $browser)
    {
        $this->browser = $browser;
        return $this;
    }




}
