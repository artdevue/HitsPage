<?php
/**
 * This file is extra HitsPage Pageviews for MODX Revolution.
 *
 * @copyright Copyright (C) 2013, Artdevue Ltd, <info@artdevue.com>
 * @author Valentin Rasulov <info@artdevue.com>
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License v2
 * @package hitspage
 *
 */
$page =  $modx->getObject('modResource', $modx->resource->get('id'));
$view = 0;
// Check the option to record in TV
if($saveTv == 'true') {
    // get the required TV object by name (or id)
    $tv = $modx->getObject('modTemplateVar',array('name'=>'HitsPage'));
    if($tv) {
        $tvs = $modx->getObject('modTemplateVarResource',array('tmplvarid'=>$tv->id, 'contentid'=>$page->get('id')));
        if($tvs) {
            $viewTv = $tvs->get('value');
            $tvs->set('value',intval($viewTv) + 1);
            if($tvs->save()) $view = $viewTv;
        } else {
            $tvn = $modx->newObject('modTemplateVarResource');
            $tvn->set('tmplvarid',$tv->id);
            $tvn->set('contentid',$page->get('id'));
            $tvn->set('value',1);
            if($tvn->save()) $view = 1;
        }       
    } 
} else {
    $view = $page->getProperty('hitts','hitspage',$view);
}
$page->setProperty('hitts',intval($view) + 1,'hitspage');
$page->save();
return $view;