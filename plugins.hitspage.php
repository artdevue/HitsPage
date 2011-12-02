<?php
/*
 * MODx Revolution
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * HitsPage
 * Copyright 2011 by Artdevue.com  <info@artdevue.com>
 * Sentences on an e-mail: info@artdevue.com
 * The author: Valentine Rasulov
 * A dynamic form processing Plugins for MODx Revolution 2.0.
 * @package HitsPage
 *
 *
 * Plugins HitsPage counts the number of visitors to this page (do not take into account the unique users)
 * Installation manual
 * After you install, you will create the Template Variables with the name HitsPage
 * Attention! Do not forget to specify a template for Template Variables HitsPage
 * All modules and extensions like an ordinary call Template Variables, and on the resource page, put a call placeholders [[!+hitss]]
 *
 * For example: call in getResources - [[!getResources? &parents=`5` &tpl=`myRowTpl` &includeTVs=`1` &processTVs=`1`]]
 * call in the template myRowTpl Template Variables - [[tv.HitsPage]]
 * 
 * The resource, which will be counting visits to the place where you want to show the number, call pleychholder [[!+hitss]]
 * Do not place the call Template Variables HitsPage, since the result is not cached
 * 
 */
//$idtv = '10'; 
if ($modx->event->name != 'OnLoadWebDocument') return;
$tv = $modx->getObject('modTemplateVar',array('name'=>'HitsPage'));
if($tv){
  $idtv = $tv->id;
  $id = $modx->resource->get('id');
  $prosmotr=0;
  $tvs = $modx->getObject('modTemplateVarResource',array('tmplvarid'=>$idtv, 'contentid'=>$id));
  if($tvs) {
    $prosmotr=$tvs->get('value');
    $prosmotr++;
    $tvs->set('value',$prosmotr);
    $tvs->save();
  }
  if($prosmotr==0) {
    $prosmotr=1;
    $tv = $modx->newObject('modTemplateVarResource');
    $tv->set('tmplvarid',$idtv);
    $tv->set('contentid',$id);
    $tv->set('value',$prosmotr);
    $tv->save();
  }
  $modx->setPlaceholder('hitss', $prosmotr);
}