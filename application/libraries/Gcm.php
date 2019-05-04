<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Usage: $this->ios->to('DEVICE_ID')->badge(3)->message('Hello world');
class gcm
{
	private $host = '';
	private $apiKey = '';


	private $_CI;
	
	public function __construct()
	{
		$this->_CI =& get_instance();
		$this->_CI->config->load('gcm', TRUE);

		$config = $this->_CI->config->item('gcm');

		foreach ($config as $key => $value)
		{
			if(isset($this->$key))
				$this->$key = $value;
		}
	}

	public function loadConfiguration($jsonConfiguration)
	{
		$objConfiguration = json_decode($jsonConfiguration);

		if(is_object($objConfiguration))
		{
			$arrayProperties = get_object_vars($objConfiguration);

			foreach ($arrayProperties as $property => $value){
				if(isset($this->$property))
				{
					$this->$property = $value;
				}
			}
		}
	}

	public function buildJsonPush($deviceToken, $arrayDataPush,$isIOS)
	{
		$arrayPush = array();

		if(is_array($deviceToken))
			$arrayPush["registration_ids"] = $deviceToken;
		else
			$arrayPush["registration_ids"] = array($deviceToken);

		$arrayPush["data"] = $arrayDataPush;

		if ($isIOS){
            $arrayPush["notification"] = array("title"=>$arrayDataPush->titulo, "body"=>$arrayDataPush->mensaje);
        }

		return json_encode($arrayPush);
	}


	public function sendMessage($jsonPush='')
	{
		$headers = array(
            'Authorization: key=' . $this->apiKey,
            'Content-Type: application/json'
        );

		$ch = curl_init();

		//echo $jsonPush."<br />";
		//echo $this->apiKey."<br />";
		//echo $this->host."<br />";

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $this->host);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPush);

        // Execute post
        $result = curl_exec($ch);


        //echo "<pre>";
        //print_r($result);
        //exit();

        //fwrite($myfile," Resultado: ".$result);

        if ($result === FALSE) {
            show_error("GCM Failed");
        }else{
          log_message('debug',"GCM: Push: ".$jsonPush."\n");
        }

        // Close connection
        curl_close($ch);

        $objResultPush = json_decode($result);
        log_message('debug',"GCM: Result Push ".date("Y-m-d H:i:s")." : ".$result."\n");

        return $objResultPush;
	}
}