<?php
switch ($modx->event->name) {
    case 'OnWebPagePrerender':
        if($modx->hpCount === true) {
            // get a reference to the output
			$output = &$modx->resource->_output;
    		if (preg_match_all ("/{%hp-(\d+?)%}/",$output , $hp_list)) {
			  // If the array is not empty, choose the number of comments on the resource id (column rid)
			  if (is_array($hp_list)) {
				  array_walk($hp_list[1], 'intval');
				  $hp = $modx->newQuery('modResource', array('id:IN' => $hp_list[1]));
				  $hp->select(array('modResource.id','modResource.properties'));
				  if ($hp->prepare() && $hp->stmt->execute()) {
					  $resultsHp = $hp->stmt->fetchAll(PDO::FETCH_ASSOC);
					  foreach ($resultsHp as $rHp) {
						  $objHP = json_decode($rHp['properties']);
						  if (in_array($rHp['id'],$hp_list[1])) {
							  $hp_list[1][array_search($rHp['id'],$hp_list[1],true)] =  intval($objHP->hitspage->hitts);
						  }
					  }
				  }
			  }
			  // Replace all your templates in the resource to the correct values
			  $output = str_replace($hp_list[0], $hp_list[1], $output);
		  }
        }
    break;
}