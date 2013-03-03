<?php

/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2: */

class AclArosController extends AclAppController {
	var $name = 'AclAros';

  public $components = array('RequestHandler');

  public function beforeFilter() {
    parent::beforeFilter();
  }

  public function load($id) {

		$n = $this->AclAro->find(
			'first',
			array(
				'conditions' => array(
					'AclAro.id' => $id
				),
				'contain' => false
			)
		);
		$data = array(
			'id' => $n['AclAro']['id'],
			'alias' => $n['AclAro']['alias'],
			'model' => $n['AclAro']['model'],
			'key' => $n['AclAro']['foreign_key'],
			'parent_id' => $n['AclAro']['parent_id']
		);

    $this->set('data',$data);
		$this->set('_serialize', array('data'));
	}

  public function delete($id) {
		if ($this->AclAro->delete($id)) {
			$this->success();
		} else {
      $this->failure();
    }
	}

  public function children($id = 0) {
		Configure::write('debug', 0);
		$this->layout = '';

		$node = $this->AclAro->find(
			'first',
			array(
				'conditions' => array(
					'AclAro.id' => $id
				),
				'contain' => false
			)
		);

		$children = $this->AclAro->children($id, true, null, null, null, 1, 0);

		$sorted = array();
		foreach ($children as $c) {
			$c['AclAro']['children'] = ($c['AclAro']['rght'] - $c['AclAro']['lft'] - 1) / 2;
			if (empty($c['AclAro']['alias'])) {
				$c['AclAro']['alias'] = $c['AclAro']['model'] . ' - ' . $c['AclAro']['foreign_key'];
			}
			$sorted[$c['AclAro']['alias']] = $c;
		}
		ksort($sorted);

		$this->set('node', $node);
		$this->set('children', $sorted);
	}

  public function add() {
		if (isset($this->request->data['AclAro']['parent_id']) &&  !$this->request->data['AclAro']['parent_id']) {
			$this->request->data['AclAro']['parent_id'] = null;
		}
		if ($this->AclAro->save($this->request->data)) {
      $this->success();
    } else {
      $this->failure();
    }
	}

  public function update() {
		if (isset($this->request->data['AclAro']['parent_id']) &&  !$this->request->data['AclAro']['parent_id']) {
			$this->request->data['AclAro']['parent_id'] = null;
		}
		if ($this->AclAro->save($this->request->data)) {
      $this->success();
    } else {
      $this->failure();
    }
	}

}

?>
