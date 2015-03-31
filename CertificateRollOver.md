# Certificate rollover #
JANUS supports signing certificate rollover, to make it easier to change certificates on a production environment.

By defining a metadata field called `certData2`, JANUS will export both the certificate defined in `certData` and `certData2` as signing certificates.

This means that metadata exported for the given entity is exported with two distinct certificates, making it easy and simple to change certificates for a given entity in a production environment.