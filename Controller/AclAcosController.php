<?php

/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2: */

class AclAcosController extends AclAppController {
  public $name = 'AclAcos';

  public $uses = array('Acl.AclAco');

  public $components = array('RequestHandler');

  public function load($id) {

		$n = $this->AclAco->find(
			'first',
			array(
				'conditions' => array(
					'AclAco.id' => $id
				),
				'contain' => false
			)
		);
		$data = array(
			'id' => $n['AclAco']['id'],
			'alias' => $n['AclAco']['alias'],
			'model' => $n['AclAco']['model'],
			'key' => $n['AclAco']['foreign_key'],
			'parent_id' => $n['AclAco']['parent_id']
		);

		$this->set('data',$data);
    $this->set('_serialize',array('data'));
	}

  public function delete($id) {
		if ($this->AclAco->delete($id)) {
      $this->success();
    } else {
			$this->failure();
		}
	}

  public function children($id = null) {
		//Configure::write('debug', 0);
		$this->layout = '';

		$node = $this->AclAco->find(
			'first',
			array(
				'conditions' => array(
					'AclAco.id' => $id
				),
				'contain' => false
			)
		);

		$children = $this->AclAco->children($id, true, null, null, null, 1, 0);

		$sorted = array();
		foreach ($children as $c) {
			$c['AclAco']['children'] = ($c['AclAco']['rght'] - $c['AclAco']['lft'] - 1) / 2;
			if (empty($c['AclAco']['alias'])) {
				$c['AclAco']['alias'] = $c['AclAco']['model'] . ' - ' . $c['AclAco']['foreign_key'];
			}
			$sorted[$c['AclAco']['alias']] = $c;
		}
		ksort($sorted);

		$this->set('node', $node);
		$this->set('children', $sorted);
	}

  public function add() {
		if (isset($this->request->data['AclAco']['parent_id']) &&  !$this->request->data['AclAco']['parent_id']) {
			$this->request->data['AclAco']['parent_id'] = null;
		}
		if ($this->AclAco->save($this->request->data)) {
			$this->success();
		} else {
      $this->failure();
    }
	}

  public function update() {
		if (isset($this->request->data['AclAco']['parent_id']) &&  !$this->request->data['AclAco']['parent_id']) {
			$this->request->data['AclAco']['parent_id'] = null;
		}
		$this->layout = '';
		if ($this->AclAco->save($this->request->data)) {
      $this->success();
    } else {
      $this->failure();
    }
	}

}

?>
