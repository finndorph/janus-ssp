# Demonstration #
<a href='http://www.youtube.com/watch?feature=player_embedded&v=c2wIvwptXHk' target='_blank'><img src='http://img.youtube.com/vi/c2wIvwptXHk/0.jpg' width='425' height=344 /></a>

# Specifying Attributes #
In the configuration file, you can define what attributes, that can be used for generation Attribute Release Policies. The attributes are defined in the option `attributes`. The syntax is as follows:

```
'attributes' => array(
    'LABEL1' => array(
        'name' => 'ATTRIBUTE_NAME1',
        'specify_values' => BOOLEAN
    ),
    'LABEL2' => array(
        'name' => 'ATTRIBUTE_NAME'2,
        'specify_values' => BOOLEAN
    ),
    ...
),
```

The LABEL is how the attribute is displayed, for example "Common Name".

The ATTRIBUTE\_NAME is the actual name of the attribute, for example "urn:mace:dir:attribute-def:cn" (SAML1) or "urn:oid:2.5.4.3" (SAML2).

The specify\_values setting controls whether you want to require the user to specify allowed values for the attribute.
For exmple the "urn:oid:1.3.6.1.4.1.5923.1.5.1.1" or "isMemberOf" attribute, one might specify that the membership is only released if it has the value of 'federation-users' or 'federation-admins', effectively filtering out all other (IdP supplied) memberships.

**NOTE** that you can ONLY get at the specified values via the REST API, these are not supported in the metadata export.

# Default ARP #
You can define a default ARP for those entities, that do not have an ARP selected. This is defined in the option `entity.defaultarp`.

Example on configuring the `entity.defaultarp`

```
'entity.defaultarp' => array(
    'eduPersonTargetdID',
    'mail',
),
```