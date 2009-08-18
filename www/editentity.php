<?php
error_reporting(E_ALL);
// Initial import
$session = SimpleSAML_Session::getInstance();
$config = SimpleSAML_Configuration::getInstance();
$janus_config = SimpleSAML_Configuration::getConfig('module_janus.php');

// Get data from config
$authsource = $janus_config->getValue('auth', 'login-admin');
$useridattr = $janus_config->getValue('useridattr', 'eduPersonPrincipalName');
$workflow = $janus_config->getValue('workflow_states');

// Validate user
if ($session->isValid($authsource)) {
	$attributes = $session->getAttributes();
	// Check if userid exists
	if (!isset($attributes[$useridattr])) 
		throw new Exception('User ID is missing');
	$userid = $attributes[$useridattr][0];
} else {
	SimpleSAML_Utilities::redirect(SimpleSAML_Module::getModuleURL('janus/index.php'));
}


// Get metadata to present remote entitites
$metadata = SimpleSAML_Metadata_MetaDataStorageHandler::getMetadataHandler();
// Get Entity controller
$mcontroller = new sspmod_janus_EntityController($janus_config);

// Get the user
$user = new sspmod_janus_User($janus_config->getValue('store'));
$user->setEmail($userid);
$user->load(sspmod_janus_User::EMAIL_LOAD);

// Get correct revision
$revisionid = -1;
if(isset($_GET['revisionid'])) {
	$revisionid = $_GET['revisionid'];
}

// Get the correct entity
if(!empty($_POST)) {
	$eid = $_POST['eid'];
    $revisionid = $_POST['revisionid'];
} else {
	$eid = $_GET['eid'];
}

if($revisionid > -1) {
	if(!$entity = $mcontroller->setEntity($eid, $revisionid)) {
		die('Error in setEntity');
	}
} else {
	// Revision not set, get latest
	if(!$entity = &$mcontroller->setEntity($eid)) {
		die('Error in setEntity');
	}
}
// load entity
$mcontroller->loadEntity();

// Check if user is allowed to se entity
$allowedUsers = $mcontroller->getUsers();
if(!array_key_exists($userid, $allowedUsers)) {
	SimpleSAML_Utilities::redirect(SimpleSAML_Module::getModuleURL('janus/index.php'));
}

$update = FALSE;

if(!empty($_POST)) {
	// Attribute
	if(isset($_POST['delete-attribute'])) {
		foreach($_POST['delete-attribute'] AS $data) {
			if($mcontroller->removeAttribute($data)) {
				$update = TRUE;
			}
		}
	}
	
	if(!empty($_POST['att_key'])) {
		if($mcontroller->addAttribute($_POST['att_key'], $_POST['att_value'])) {
			$update = TRUE;
		}
	}

	// Metadata
	if(!empty($_POST['meta_key'])) {
		if($_POST['meta_key'] != 'NULL' && $mcontroller->addMetadata($_POST['meta_key'], $_POST['meta_value'])) {
			$update = TRUE;
		}
	}

	if(!empty($_POST['meta_xml'])) {
		if($entity->getType() == 'saml20-sp') {
			if($msg = $mcontroller->importMetadata20SP($_POST['meta_xml'])) {
				$update = TRUE;
			}
		} else if($entity->getType() == 'saml20-idp') {
			if($msg = $mcontroller->importMetadata20IdP($_POST['meta_xml'])) {
				$update = TRUE;
			}
		} else {
			die('Type error');
		}
	}

	// Update metadata and attributes
	foreach($_POST AS $key => $value) {
		if(substr($key, 0, 14) == 'edit-metadata-') {
			if(!empty($value) && !is_array($value)) {
				$newkey = substr($key, 14, strlen($key));
				if($mcontroller->updateMetadata($newkey, $value)) {
					$update = TRUE;
				}
			}
		} else if(substr($key, 0, 15) == 'edit-attribute-') {
			if(!empty($value) && !is_array($value)) {
				$newkey = substr($key, 15, strlen($key));
				if($mcontroller->updateAttribute($newkey, $value)) {
					$update = TRUE;
				}
			}
		}
	}
	
	if(isset($_POST['delete-metadata'])) {
		foreach($_POST['delete-metadata'] AS $data) {
			if($mcontroller->removeMetadata($data)) {
				$update = TRUE;
			}
		}
	}
	

	// Remote entities 	
	if(isset($_POST['add'])) {
		$mcontroller->setAllowedAll('yes');
		$mcontroller->setAllowedAll('no');
		foreach($_POST['add'] AS $key) {
			if($mcontroller->addBlockedEntity($key)) {
				$update = TRUE;
			}
		}
	} else {
		$mcontroller->setAllowedAll('yes');
		$mcontroller->setAllowedAll('no');
		$update = TRUE;
	}
	
	// Allowedal
	if(isset($_POST['allowedall'])) {
		if($mcontroller->setAllowedAll('yes')) {
			$update = TRUE;
		}
	} else {
		if($mcontroller->setAllowedAll('no')) {
			$update = TRUE;
		}
	}

    if(isset($_POST['entity_workflow'])) {
    	if($entity->setWorkflow($_POST['entity_workflow'])) {
	    	$update = TRUE;
	    }
    }

	if($entity->setType($_POST['entity_type'])) {
		$update = TRUE;
	}

    $entity->setParent($entity->getRevisionid());

    if(empty($_POST['revisionnote'])) {
        $entity->setRevisionnote('No revision note');
    } else {
        $entity->setRevisionnote($_POST['revisionnote']);
    }

	// Update entity if updated
	if($update) {
		$mcontroller->saveEntity();
	}
}

$et = new SimpleSAML_XHTML_Template($config, 'janus:editentity.php', 'janus:janus');

if($entity->getType() == 'saml20-sp') {
	$remote_entities = $metadata->getList('saml20-idp-remote');
	$et->data['metadata_select'] = $janus_config->getValue('metadatafields.saml20-sp');
} else {
	$remote_entities = $metadata->getList('saml20-sp-remote');
	$et->data['metadata_select'] = $janus_config->getValue('metadatafields.saml20-idp');
}

// Get allowed workflows
$allowed_workflow = array();
$allowed_workflow[] = $entity->getWorkflow();
foreach($workflow[$entity->getWorkflow()] AS $k_wf => $v_wf) {
	if(in_array($user->getType(), $v_wf['role']) || in_array('all', $v_wf['role'])) {
		$allowed_workflow[] = $k_wf;
	}
}

$et->data['entity_state'] = $entity->getWorkflow();
$et->data['entity_type'] = $entity->getType();
$et->data['revisionid'] = $entity->getRevisionid();
$et->data['types'] = $janus_config->getValue('types');
$et->data['workflowstates'] = $janus_config->getValue('workflowstates');
$et->data['access'] = $janus_config->getValue('access');
$et->data['workflow'] = $allowed_workflow;
$et->data['entity'] = $entity;
$et->data['user'] = $user;
$et->data['uiguard'] = new sspmod_janus_UIguard($janus_config->getValue('access'));
$et->data['mcontroller'] = $mcontroller;
$et->data['blocked_entities'] = $mcontroller->getBlockedEntities();
$et->data['remote_entities'] = $remote_entities; 

$et->data['header'] = 'JANUS';
if(isset($msg)) {
	$et->data['msg'] = $msg;
}

$et->show();
?>
