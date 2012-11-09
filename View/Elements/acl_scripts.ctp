<?php
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2: */

$this->Html->css('/acl/css/acl', null, array('inline' => false));
$this->Html->script(array('/acl/js/acl'), array('inline' => false));
$this->Html->scriptBlock(
  'acl_base_url = \'' . Router::url('/acl',true) . '\';',
  array('inline' => false)
);