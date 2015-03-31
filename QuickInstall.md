# Quick installation of JANUS (Stable Version) #

**NOTE Latest stable version of SimpleSAMLphp is adviced**

  1. Obtain root priviliges
> > `$ sudo su -`
  1. `$ apt-get install subversion`
  1. `$ cd /var/simplesamlphp/bin`
  1. `$ ./pack.php install http://janus-ssp.googlecode.com/svn/trunk/definition.json stable`
  1. `$ sudo apt-get install phpmyadmin`
  1. Try to open `https://<your_hostname>/phpmyadmin` sure it comes out the required credentials
  1. Create a new database and a new user.
    1. `$ mysql -u root -pYOURPASS`
    1. `create database character set utf8 <name_of_janus_db>;`
    1. `grant all privileges on <name_of_janus_db>. <name_of_user_janus_db> * to @ localhost IDENTIFIED BY '<userdb_password>';`
    1. `quit`
  1. Installation JANUS Web Installer:
    1. Decide the Storage Engine (ENGINE = INNODB) and the Character Set (DEFAULT CHARSET = utf8) to use and set them for all tables in the file "janus.sql"
    1. Activate the JANUS form:
> > > `$ touch /var/simplesamlphp/modules/janus/enable`
    1. Access `https://<your_hostname>/simplesaml/module.php/janus/install/index.php` and fill in the fields with "localhost" as the host and press on the button "Install"
    1. Replace the contents of the `module_janus.php` with the code that created the summary page and change `'auth' => 'mailtoken'`, in `'auth' => 'Janus-SSP-SP'`, where `Janus-SSP-SP` is an auth source for a SimpleSAMLphp Service Provider you can authenticate to an Identity Provider.
    1. Remove the folder janus/www/install/:
> > > `$ rm -Rf /var/simplesamlphp/modules/janus/www/install/`
  1. Now, when you try to launch the module you will be redirected SimpleSAMLphp by JANUS on IdP to authenticate and gain access to the JANUS Dashboard where you can manage the metadata of the various SP and IdP.

This guide was kindly provided by Marco Malavolti