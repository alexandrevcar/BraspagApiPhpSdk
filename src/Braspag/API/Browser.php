<?php
namespace Braspag\API;

class Browser implements \JsonSerializable
{
   private $cookiesAccepted;
   private $email;
   private $hostName;
   private $ipAddress;
   private $type;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    public function populate(\stdClass $data)
    {
        $this->cookiesAccepted = isset($data->cookiesAccepted)? $data->cookiesAccepted: null;
        $this->email = isset($data->email)? $data->email: null;
        $this->hostName = isset($data->hostName)? $data->hostName: null;
        $this->ipAddress = isset($data->ipAddress)? $data->ipAddress: null;
        $this->type = isset($data->type)? $data->type: null;         
    }
    
    public function getCookiesAccepted()
    {
        return $this->cookiesAccepted;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getHostName()
    {
        return $this->hostName;
    }

    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setCookiesAccepted($cookiesAccepted)
    {
        $this->cookiesAccepted = $cookiesAccepted;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setHostName($hostName)
    {
        $this->hostName = $hostName;
        return $this;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
