# Install simpleSAMLphp #
The first thing you need to do is to install simpleSAMLphp (SSP) on to your system.

## Setup an authentication source ##
You need to setup an authentication source in SSP for JANUS to use.

# Install JANUS #
Before installing JANUS, you need get the version that is suited for your SSP installation.

If you are using SSP 1.6.x you need to install the 1.7.x version of JANUS.

If you are using SSP version 1.7.x or higher you should install the latest version featured in the ["Downloads"](http://code.google.com/p/janus-ssp/downloads/list) section or via SimpleSAMLphp [pack.php](http://simplesamlphp.org/docs/1.8/pack) tool, see [guide](QuickInstall.md).

To set up JANUS you need to do the following:

  * Set up the database
  * Configure JANUS

Set the parameter `useridattr` to match the attribute you want
to make the connection between the user and the entities. This attribute must be delivered for all uses.

Next you need to set up a database. Complete SQL statements for MySQL is located in a separate file, `janus.sql` which is located in the `docs` directory.

You should change the storageengine and characterset to fit your needs. You can
use another prefix for the table names, by editing the `prefix` option in the
configuration file.

In order to easily set up the database, create the initial admin user and a basic configuration file, please run the install script in your browser located in `<doman>/module.php/janus/install/`

**NB!** You should delete the `install` directory after use, before using JANUS in a production enviroment.

For a complete list of all options in the configuration file please see the documentation the configuration file located [here](configurationfile.md).