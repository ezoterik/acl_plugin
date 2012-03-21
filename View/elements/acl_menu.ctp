<?php
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2: */
?>
<div class="acl_menu">
<?php print $this->Html->image('/acl/img/tango/32x32/places/folder.png', array('align' => 'absmiddle')) ?><?php print $this->Html->link('Acl Menu', array('plugin' => 'acl', 'prefix' => 'admin', 'controller' => 'acl', 'action' => 'index')) ?>

<?php print $this->Html->image('/acl/img/tango/32x32/apps/system-users.png', array('align' => 'absmiddle')) ?><?php print $this->Html->link('Manage Aros', array('plugin' => 'acl', 'prefix' => 'admin', 'controller' => 'acl', 'action' => 'aros')) ?>

<?php print $this->Html->image('/acl/img/tango/32x32/apps/preferences-system-windows.png', array('align' => 'absmiddle')) ?><?php print $this->Html->link('Manage Acos', array('plugin' => 'acl', 'prefix' => 'admin', 'controller' => 'acl', 'action' => 'acos')) ?>

<?php print $this->Html->image('/acl/img/tango/32x32/emblems/emblem-readonly.png', array('align' => 'absmiddle')) ?><?php print $this->Html->link('Manage Permissions', array('plugin' => 'acl', 'prefix' => 'admin', 'controller' => 'acl', 'action' => 'permissions')) ?>
</div>
