<?php

$wid = Session::get('wid');
$album = new Model('micro_shipin_album');
$set   = new Model('micro_shipin_set');
$set->find(array('wid'=>$wid));

if(Request::get(1)){
	$album->find(Request::get(1));
	if($album->wid != $wid){
		die();
	}
}
if($album->try_post()){
	$album->wid = $wid;
	$album->shipin_id = $set->id;
	$album->save();
	tusi('保存成功');
	Redirect::delay_to('loupanxiangce',1);
	
}