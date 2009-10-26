<?php

if(isset($_POST['action']) && $_POST['action'] == 'install') {

	$type = $_POST['dbtype'];	
	$host = $_POST['dbhost'];
	$name = $_POST['dbname'];
	$prefix = $_POST['dbprefix'];
	$user = $_POST['dbuser'];
	$pass = $_POST['dbpass'];

	$dsn = $type .':host='. $host . ';dbname='. $name;

	try {
		$admin_email = $_POST['admin_email']; 
		$admin_name = $_POST['admin_name']; 

		$dbh = new PDO($dsn, $user, $pass);

		$dbh->beginTransaction();

		// Token table
		$dbh->exec("DROP TABLE IF EXISTS `". $prefix ."__tokens`;");
		$dbh->exec("CREATE TABLE `". $prefix ."__tokens` (
				`id` int(11) NOT NULL auto_increment,
				`mail` varchar(320) NOT NULL,
				`token` varchar(255) NOT NULL,
				`notvalidafter` varchar(255) NOT NULL,
				`usedat` varchar(255) default NULL,
				 PRIMARY KEY  (`id`),
				 UNIQUE KEY `token` (`token`)
			) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

		// User table
		$dbh->exec("DROP TABLE IF EXISTS `". $prefix ."__user`;");
		$dbh->exec("CREATE TABLE `". $prefix ."__user` (
			`uid` int(11) NOT NULL auto_increment,
			`type` text,
			`email` varchar(320) default NULL,
			`active` char(3) default 'yes',
			`update` char(25) default NULL,
			`created` char(25) default NULL,
			`ip` char(15) default NULL,
			`data` text,
			PRIMARY KEY  (`uid`)
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

		// Insert admin user
		$st = $dbh->prepare("INSERT INTO `". $prefix ."__user` (`uid`, `type`, `email`, `active`, `update`, `created`, `ip`, `data`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
		$st->execute(array(NULL, 'admin', $admin_email, 'yes', date('c'), date('c'), $_SERVER['REMOTE_ADDR'], 'Navn: '.$admin_name));

		// Entity table
		$dbh->exec("DROP TABLE IF EXISTS `". $prefix ."__entity`;");
		$dbh->exec("CREATE TABLE `". $prefix ."__entity` (
			`entityid` text,
			`revisionid` int(11) default NULL,
			`system` text,
			`state` text,
			`type` text,
			`expiration` char(25) default NULL,
			`metadataurl` text,
			`allowedall` char(3) NOT NULL default 'yes',
			`allowedlist` text,
			`authcontext` int(11) default NULL,
			`created` char(25) default NULL,
			`ip` char(15) default NULL
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

		// Metadata table
		$dbh->exec("DROP TABLE IF EXISTS `". $prefix ."__metadata`;");
		$dbh->exec("CREATE TABLE `". $prefix ."__metadata` (
			`entityid` text NOT NULL,
			`revisionid` int(11) NOT NULL,
			`key` text NOT NULL,
			`value` text NOT NULL,
			`created` char(25) NOT NULL,
			`ip` char(15) NOT NULL
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

		// Blocked entities table
		$dbh->exec("DROP TABLE IF EXISTS `". $prefix ."__blockedEntity`;");
		$dbh->exec("CREATE TABLE `". $prefix ."__blockedEntity` (
			`entityid` text NOT NULL,
			`revisionid` int(11) NOT NULL,
			`remoteentityid` text NOT NULL,
			`created` char(25) NOT NULL,
			`ip` char(15) NOT NULL
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

		// Relation between user and entity table
		$dbh->exec("DROP TABLE IF EXISTS `". $prefix ."__hasEntity`;");
		$dbh->exec("CREATE TABLE `". $prefix ."__hasEntity` (
			`uid` int(11) NOT NULL,
			`entityid` text,
			`created` char(25) default NULL,
			`ip` char(15) default NULL
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

		// Commit all sql
		$success = $dbh->commit();

		if($success) {
			include('config_template.php');
			$config_template['store']['dsn'] = $dsn;
			$config_template['store']['username'] = $user;
			$config_template['store']['password'] = $pass;
			$config_template['store']['prefix'] = $prefix;
			$config_template['admin.name'] = $admin_name;
			$config_template['admin.email'] = $admin_email;
			?>
			<html>
				<head>
					<title>JANUS - Installation</title>
				</head>

				</body>
					<h1>JANUS - Installation</h1>
					<p><u>Følgende tabeller er blevet oprettet:</u></p>
					<p>
						<?php echo $prefix .'__tokens oprettet.<br />'; ?>
						<?php echo $prefix .'__user oprettet.<br />'; ?>
						<?php echo $prefix .'__metadata oprettet.<br />'; ?>
						<?php echo $prefix .'__entity oprettet.<br />'; ?>
						<?php echo $prefix .'__blockedEntity oprettet.<br />'; ?>
						<?php echo $prefix .'__hasEntity oprettet.<br />'; ?>
					</p>
					<p><u>Følgende bruger er blevet oprettet:</u></p>
					<p><?php echo $email; ?></p>
					<p>Tillykke. JANUS er nu installeret.<p>
					<p>Du skal tilføje følgende til <tt>authsources.php</tt> for at login modulet virker:</p>
					<pre style="border: 1px solid #000000;">
'mailtoken' =&gt; array(
	'janus:MailToken',
	'dsn' =&gt; '<?php echo $dsn; ?>',
	'username' =&gt; '<?php echo $user; ?>',
	'password' =&gt; '<?php echo $pass; ?>',
	'table' =&gt; '<?php echo $prefix; ?>__tokens',
),</pre>
					<p>Følgende skal du ligge i en fil kaldet module_janus.php  og placerer den i SimpleSAMLphps config mappe:</p>
					<pre style="border: 1px solid #000000;">
<?php echo '$config => ' . var_export($config_template, TRUE); ?></pre>
					<p><b>Husk at slette installationsbiblioteket, da installation ellers kan overskrives.</b><p>
					<hr>
					<address>JANUS - <a href="mailto:jach@wayf.dk">Jacob Christiansen</A></address>
				</body>
			</html>
			<?php
			die();
		} else {
		?>
			<html>
				<head>
					<title>JANUS - Installation</title>
				</head>

				</body>
					<h1>JANUS - Installation</h1>
					<p>Der er sket en fejl. Kontroller at forbindelsen til din database, samt konfigurationen er i orden og prøv igen.<p>
					<a href="<?php echo SimpleSAML_Module::getModuleURL('janus/install/index.php'); ?>">Tilbage</a><br /><br />';
					<hr>
					<address>JANUS - <a href="mailto:jach@wayf.dk">Jacob Christiansen</A></address>
				</body>
			</html>
		<?php
		die();
		}

		$dbh = null;
	} catch (PDOException $e) {
		?>
		<html>
			<head>
				<title>JANUS - Installation</title>
			</head>
			</body>
				<h1>JANUS - Installation</h1>
				<p>Der er sket en fejl. Kontroller at forbindelsen til din database, samt konfigurationen er i orden og prøv igen.<p>
				<p><?php echo $e->getMessage(); ?></p>
				<a href="<?php echo SimpleSAML_Module::getModuleURL('janus/install/index.php'); ?>">Tilbage</a><br /><br />
				<hr>
				<address>JANUS - <a href="mailto:jach@wayf.dk">Jacob Christiansen</A></address>
			</body>
		</html>
		<?php
		die();
	}
} else {
	?>
<html>
	<head>
		<title>JANUS - Installation</title>
		<style type="css/text">
			th {
				align: left;
			}
		</style>
	</head>
	</body>
		<h1>JANUS - Installation</h1>
		<p>Velkommen til JANUS installationen.</p>
		<p>Når du trykker `Install` oprettes alle tabeller som JANUS skal bruge inkl. tabeller til autensificerings modulet. Derudover laves der en konfigurationsfil, som du selv skal kopierer til din SimpleSAMLphp installation. Kode til authsource laves også.</p>
		<p><strong>OBS!</strong> Denne installer er kun til brug med en MySQL database.</p>
		<p>Du skal desuden udfylde informationer om administratoren. Der vil efterfølgende blive oprettet en admin bruger med disse informationer.</p>
		<form method="post" action="">
				<fieldset>
					<legend>Database</legend>
					<table border="0">
						<tr>
							<td>
								<label for="dbtype">Database type</label>
							</td>
							<td>
								<input type="text" name="dbtype" value="mysql" readonly="readonly" /><br />
							</td>
						</tr>
						<tr>
							<td>
								<label for="dbhost">Database host</label>
							</td>
							<td>
								<input type="text" name="dbhost" /><br />
							</td>
						</tr>
						<tr>
							<td>
								<label for="dbname">Database name</label>
							</td>
							<td>
								<input type="text" name="dbname" /><br />
							</td>
						</tr>
						<tr>
							<td>
								<label for="dbprefix">Database prefix</label>
							</td>
							<td>
								<input type="text" name="dbprefix" /><br />
							</td>
						</tr>
						<tr>
							<td>
								<label for="dbuser">Database username</label>
							</td>
							<td>
								<input type="text" name="dbuser" /><br />
							</td>
						</tr>
						<tr>
							<td>
								<label for="dbpass">Database password</label>
							</td>
							<td>
								<input type="text" name="dbpass" />
							</td>
						</tr>
					</table>
				</fieldset>
				<fieldset>
					<legend>Administrator bruger</legend>
					<table border="0">
						<tr>
							<td>
								<label for="admin_name">Navn</label>
							</td>
							<td>
								<input type="text" name="admin_name" /></br>
							</td>
						</tr>
						<tr>
							<td>
								<label for="admin_email">E-mail</label>
							</td>
							<td>
								<input type="text" name="admin_email" /></br>
							</td>
						</tr>
					</table>
				</fieldset><br />
				<input type="submit" name="submit_admin_user" value="Install" />
				<input type="hidden" name="action" value="install" />
		</form>
		<hr>
		<address>JANUS - <a href="mailto:jach@wayf.dk">Jacob Christiansen</A></address>
	</body>
</html>
<?php
}
?>