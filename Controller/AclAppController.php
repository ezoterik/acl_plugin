<?php

/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2: */

class AclAppController extends AppController {

  public function success(array $serialize=array() ) {
    $this->set('response',array('code'=>'200'));
    $this->set('_serialize',array_merge(array('response'),$serialize));
	}

  public function failure(array $serialize=array(), $message=false) {
    $this->set('response',array('code'=>'500','message'=>$message));
    $this->set('_serialize',array_merge(array('response'),$serialize));
	}

}

?>
