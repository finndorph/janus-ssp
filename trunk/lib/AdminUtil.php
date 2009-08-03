<?php
class sspmod_janus_AdminUtil extends sspmod_janus_Database{

	private $config;

	public function __construct() {
		
		$this->config = SimpleSAML_Configuration::getConfig('module_janus.php');
		
		// Send DB config to parent class
		parent::__construct($this->config->getValue('store'));
	}

	public function getEntities() {
		
		$st = self::execute('SELECT `eid`, `entityid`, MAX(`revisionid`) AS `revisionid`, `created`  FROM `'. self::$prefix .'__entity` GROUP BY `entityid`;', array());

		if($st === FALSE) {
			SimpleSAML_Logger::error('JANUS: Error fetching all entities');
			return FALSE;
		}

		$rs = $st->fetchAll(PDO::FETCH_ASSOC);

		return $rs;
	}
	
	public function hasAccess($eid) {
		assert('is_string($eid)');
		
		$st = self::execute('
			SELECT t3.`uid`, t3.`email` 
			FROM `'. self::$prefix .'__hasEntity` AS t2, `'. self::$prefix .'__user` AS t3
		   	WHERE t3.active = ? AND t2.uid = t3.uid AND t2.`eid` = ?;
		', array('yes', $eid));
		/*
		$st = self::execute('
			SELECT t3.`uid`, t3.`email` 
			FROM `'. self::$prefix .'__hasEntity` AS t2, `'. self::$prefix .'__user` AS t3, (
				SELECT `entityid` AS eid
			   	FROM `'. self::$prefix .'__entity`
				WHERE `revisionid` = (
					SELECT MAX(`revisionid`) 
					FROM `'. self::$prefix .'__entity` 
					WHERE `entityid` = ? 
				)
			) AS t1
		   	WHERE t2.uid = t3.uid AND t2.`entityid` = t1.`eid`;
		', array($entityid));
*/
		if($st === FALSE) {
			SimpleSAML_Logger::error('JANUS: Error fetching all entities');
			return FALSE;
		}

		$rs = $st->fetchAll(PDO::FETCH_ASSOC);

		return $rs;
	}
	
	public function hasNoAccess($eid) {
		assert('is_string($eid)');
		
		$st = self::execute('
			SELECT DISTINCT(t3.`uid`), t3.`email` 
			FROM `'. self::$prefix .'__hasEntity` AS t2, `'. self::$prefix .'__user` AS t3
		   	WHERE t3.`uid` NOT IN (
				SELECT uid
				FROM `'. self::$prefix .'__hasEntity`
				WHERE `eid` = ?				
			) AND t3.`active` = ?;
		', array($eid, 'yes'));
		
		if($st === FALSE) {
			SimpleSAML_Logger::error('JANUS: Error fetching all entities');
			return FALSE;
		}

		$rs = $st->fetchAll(PDO::FETCH_ASSOC);

		return $rs;
	}
	
	public function removeUserFromEntity($eid, $uid) {
		$st = self::execute('
			DELETE FROM `'. self::$prefix .'__hasEntity` 
			WHERE `eid` = ? AND `uid` = ?;'
			, array($eid, $uid));
		
		if($st === FALSE) {
			SimpleSAML_Logger::error('JANUS: Error fetching all entities');
			return FALSE;
		}

		return TRUE;

	}
	
	public function addUserToEntity($eid, $uid) {
		$st = self::execute('
			INSERT INTO `'. self::$prefix .'__hasEntity` (`uid`, `eid`, `created`, `ip`)
		    VALUES (?, ?, ?, ?);'	
			, array($uid, $eid, date('c'), $_SERVER['REMOTE_ADDR']));
	

		if($st === FALSE) {
			SimpleSAML_Logger::error('JANUS: Error fetching all entities');
			return FALSE;
		}

		$user = new sspmod_janus_User($this->config->getValue('store'));
		$user->setUid($uid);
		$user->load();
		$email = $user->getEmail();

		return $email;

	}
}
?>
