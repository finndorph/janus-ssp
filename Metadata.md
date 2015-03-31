# Defining metadata fields #
In JANUS there is a distinction between metadata and metadata fileds. Metadata fields are configuration, describing the different types of metadata that can be configured for the entities and metadata is the actual values set for the individual entities.

This document will explain how to  configure metadata fields in the JANUS configuration file.

Defining a metadata field is done using an array:

```
'METADATAFIELDNAME' => array(
    'OPTION1' => 'OPTIONVALUE1',
    'OPTION2' => 'OPTIONVALUE2',
    ...
),
```

# Options #
The following options can be used when defining metadata fields. See [Examples](Metadata#Examples.md) section for examples or the example config file.

| **Option** | **Value** | **Required** |
|:-----------|:----------|:-------------|
| [type](Metadata#type.md) | _string_ ('text', 'file', 'select', 'boolean') | Yes |
| [filetype](Metadata#filetype.md) | _string_ | Yes (when type is `file`) |
| [maxsize](Metadata#maxsize.md) | _string_ | Yes (when type is `file`) |
| [select\_values](Metadata#select_values.md) | _array_ | Yes (if type is `select`) |
| [order](Metadata#order.md) | _int_ | No |
| [default](Metadata#default.md) | _string_, _boolean_ | No |
| [required](Metadata#required.md) | _boolean_ | No |
| [validate](Metadata#validate.md) | _string_ | No |
| [supported](Metadata#supported.md) | _array_ | SNo |
| [default\_allow](Metadata#default_allow.md) | _boolean_ | No |


---

## type ##
| **Type** | _string_ |
|:----------|:---------|
| **Required** | Yes |

Describes the type of metadata. The different types will be displayed with different input types in the edit connection view. The following types are defined:

  * `text` - Will be rendered as a text field.
  * `file` - Will be rendered as a file input box and it will allow for file upload.
  * `select` - Will be renderes as a select box.
  * `boolean` - Will be rendered as a checkbox.


---

## filetype ##
| **Type** | _string_ |
|:----------|:---------|
| **Required** | Yes, if type is `file` |

Describes what file types are allowed to be uploaded. The syntax is a ; (semicolon) separated list of file types given in the form `*.extension`.

NOTE that filtering is only done on the files extension. No mimetype inspection is done.


---

## maxsize ##
| **Type** | _string_  |
|:----------|:----------|
| **Required** | yes, if type is `file` |

Describes  the maximum file size allowed to be uploaded. The values is given on the form `NUMBER QUANTIFIER`. Valid `QUANTIFIER` are B, KB, MB, and GB. If no `QUANTIFIER` is set, then KB is used.


---

## select\_values ##
| **Type** | _array_ |
|:----------|:--------|
| **Required** | yes, is type is `select` |

Describes all possible values to be selected in the select box. The array is a simple array with string values. The values are used both as key and value in the select box.


---

## order ##
| **Type** | _int_ |
|:----------|:------|
| **Required** | No |

Describes the sort order in which the different fields are displayed, both for existing metadata and for metadata fields. If two metadata fields have the same order, the the metadata field defined first takes precedents.


---

## default ##
| **Type** | _string_, _boolean_ |
|:----------|:--------------------|
| **Required** | No |

The default values the field are populated with when forst selected. The type is _string_ when type is `text`, `file`, `select` and _boolean_ when type is `boolean`. If `default` is not set, then the field will not be populated with predefined text when created.


---

## required ##
| **Type** | _boolean_  |
|:----------|:-----------|
| **Required** | No |

Describes if a field is required for the entity. All fields marked with `required` are automatically created when new entities are created and fields marked with `required` can not be deleted.

**NOTE:** If the `required` option is used with the `supported` option, than all expanded metadata fields are marked required.


---

## validate ##
| **Type** |  |
|:----------|:-|
| **Allowed value(s)** |  |
| **Required** | No |

Name of function that should validate input. See [this page](metacustomvalidation.md) for more details.


---

## supported ##
| **Type** | _array_  |
|:----------|:---------|
| **Required** | No |

Expand the metadata field to multiple fields, based on the content of the array. The array can contain both _int_ and _string_ values.

The field name must contain a `#` for the `supported` option to take effect. The `#` character in the field name is substituted with the values in the array to produce identical fields, where only the name differs.

REMEMBER to add a `:` if you want to create multiple of the same field, but with different subkeys.

NOTE that the `required` field SHOULD NOT be used with `supported`, since all expanded fields are then required.


---

## default\_allow ##
| **Type** | _boolean_ |
|:----------|:----------|
| **Required** | No |

Describes whether or not the dafault value for the field is a valid value for the field.


---

# Examples #
Below is an example of how to define a new metadata field using the most common options.

```
'metadatafieldname' => array(
    'type' => 'text',
    'order' => 130,
    'default' => 'CHANGE ME',
    'default_allowed' => false,
    'required' => false,
),
```

Two example of the use of supported
```
'AssertionConsumerService:#:Location' => array(
    'type' => 'text',
    'order' => 140,
    'default' => 'CHANGE ME',
    'supported' => array(0,1,2,3,4),
),
'name:#' => array(
    'type' => 'text',
    'order' => 145,
    'default' => 'CHANGE ME',
    'supported' => array('en', 'da'),
),
```
The above example will give 5 entries for adding AssertionConsumerService endpoints.