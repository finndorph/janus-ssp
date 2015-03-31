The configuration file in JANUS contains some general configuration options. Common for all of these options is that they can not be omitted and need to be set.

# Configuration options #

| **Name** | **Value** | **Description** |
|:---------|:----------|:----------------|
| admin.name | _string_ | The name of the administrator of the installation |
| admin.email | _string_ | The email address of the administrator |
| auth | _string_ | The auth soource used to gain access to JANUS. Must be configured in the `authsources.php` file in SSP |
| useridattr | _string_ | Name of the attribute used to uniquely identify the users. Must be unique across all users |
| store | _array_ | The database configuration. Contains the following subkeys: `dsn`, `username`, `password` and `prefix` |
| user.autocreate | _boolean_ | Whether or not new uses should be auto created in JANUS |