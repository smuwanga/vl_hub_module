<?php

namespace App\Utils;

class Utilities {

      public static function getViralLoadProcessedResult($vlResult){
    	  $result = 'detected';
          $numericsArray = null;
          $numericsString = null;
          
          try{
               $numericsArray = Utilities::getNumerics($vlResult);
               if(count($numericsArray) > 0 ){
                $numericsString = $numericsArray[0];
               }else{
                
                $numericsString = $vlResult;
               }
              
          }catch(Exception $e) {
              $numericsString = $vlResult;
          }
         
          $numericsStringTrimmed = trim($numericsString);

          if(is_numeric($numericsStringTrimmed)){
          		if($numericsStringTrimmed <1000){
                $result = 'not detected';
              }
          			
          }elseif($numericsString == 'Not detected'){//text strcasecmp
          		$result = 'not detected';
          }elseif($numericsString == 'Target Not Detected'){//text
          		$result = 'not detected';
          }elseif($numericsString == 'There is No Result Given. The Test Failed the Quality Control Criteria. We advise you send a new sample.'){//text
          		$result = 'There is No Result Given. The Test Failed the Quality Control Criteria. We advise you send a new sample.';

          }elseif($numericsString == 'Failed'){//text
          		$result = 'Failed';
          }else if($numericsString == 'Failed.'){//text
          		$result = 'Failed.';
          }elseif($numericsString == 'Invalid'){//text
          		$result = 'Invalid';
          }

          return $result;
    }
	public static function getNumerics($str) {
    	preg_match_all('/\d+/', $str, $matches);
       
        return $matches[0];
    }
}