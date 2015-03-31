# About JANUS #
JANUS is a fully features metadata registrary administration module build on top of SimpleSAMLphp.

Please see [this wikipage](WhatIsJANUS.md) for more information.

An installation guide can be found [here](installjanus.md).

# NEWS #

## September 2013 ##
**THIS SITE IS NO LONGER BEING UPDATED.**

Responsability for JANUS has been handed over from WAYF (www.wayf.dk) to SURFnet (www.surfnet.nl). The code base has been moved to Github: https://github.com/janus-ssp/janus 


## April 2013 ##

A series of security releases has been made during April. The last one is 1.11.7. They fixes som input validation and XSS vulnerabilities that was found. It is highly recommended to upgrade to the newest version.

## 23/5-2012 ##
JANUS has been released in version 1.11.0

Changes from RC2 is:
  * Fixes [issue 340](https://code.google.com/p/janus-ssp/issues/detail?id=340) Changed <?= syntax to <?php echo

Please the see the [upgrade](upgradejanus.md) page on the wiki if upgrading an existing installation.

For complete change log please see this [page](http://code.google.com/p/janus-ssp/source/list)

## 11/5-2012 ##
JANUS has been released in version 1.11.0-RC2

Issues regarding translation and mainly the UI have been corrected since RC1. The RC2 is being released because some of the solutions committet have involved large changes.

## 27/4-2012 ##
JANUS has been released in version 1.11.0-RC1
  * Fixes [issue 218](https://code.google.com/p/janus-ssp/issues/detail?id=218) Merged the old aggregator and exportentities to one script in order to make it easier to keep it up to date. The old aggregator is not removed for backwards compability issues
  * Fixes [issue 256](https://code.google.com/p/janus-ssp/issues/detail?id=256) Added the ability to sort on name or creation time in ascending and descending order in the dashboard
  * Fixes [issue 280](https://code.google.com/p/janus-ssp/issues/detail?id=280) Changed die statements to `SimpleSAML_Error_Exception`
  * Fixes [issue 285](https://code.google.com/p/janus-ssp/issues/detail?id=285) All metadatafields are now sorted in a natual case-insensitive way
  * Fixes [issue 287](https://code.google.com/p/janus-ssp/issues/detail?id=287) List of users in the add and remove drop down box for the entities are now sorted in a natural case-insensitive way
  * Fixes [issue 288](https://code.google.com/p/janus-ssp/issues/detail?id=288) Fixed SQL statement, so the correct coresponding entityID for a eid/revisionid combination is fetched correctly
  * Fixes [issue 292](https://code.google.com/p/janus-ssp/issues/detail?id=292) The state a given revision is in is now showed in the history tab in the edit entity view
  * Fixes [issue 305](https://code.google.com/p/janus-ssp/issues/detail?id=305) Added entitiy workflow state to getIdpList/getSpList REST result
  * Fixes [issue 306](https://code.google.com/p/janus-ssp/issues/detail?id=306) Users are now redirected back to the original requested page efter authentication
  * Fixes [issue 307](https://code.google.com/p/janus-ssp/issues/detail?id=307) Added ability to disable an entity. The disabling is done on all entities
  * Fixes [issue 308](https://code.google.com/p/janus-ssp/issues/detail?id=308) Changed IP fields in the database to accomodate IPv6 addresses
  * Fixes [issue 309](https://code.google.com/p/janus-ssp/issues/detail?id=309) Added link to metadata fiels of type file, so users can access the uploaded file. The file type determins whether the file is opened in the browser or downloaded.
  * Fixes [issue 310](https://code.google.com/p/janus-ssp/issues/detail?id=310) Enforce restricted value space on metadatafields with type select
  * Fixes [issue 311](https://code.google.com/p/janus-ssp/issues/detail?id=311) Always do a redirect to the edit entity view after a post.
  * Fixes [issue 315](https://code.google.com/p/janus-ssp/issues/detail?id=315) Fixed wrong SQL statement. Thanks to Laas Toom for the patch
  * Fixes [issue 316](https://code.google.com/p/janus-ssp/issues/detail?id=316) The tab where the last edit occured are selected after save.
  * Fixes [issue 317](https://code.google.com/p/janus-ssp/issues/detail?id=317) Added support for color coding the dashboard list for visualy displaying the current state of an entity
  * Fixes [issue 319](https://code.google.com/p/janus-ssp/issues/detail?id=319) Ability to specify values for attributs (Only REST interface)
  * fixes [issue 320](https://code.google.com/p/janus-ssp/issues/detail?id=320) Remove ARP from entities on deleting an ARP
  * Fixes [issue 321](https://code.google.com/p/janus-ssp/issues/detail?id=321) Whitelist functions that may be called async
  * Fixed [Issue 322](https://code.google.com/p/janus-ssp/issues/detail?id=322) Return an empty JSON object instead of an HTML page in async calls
  * Fixes [Issue 324](https://code.google.com/p/janus-ssp/issues/detail?id=324) ARP improvements
  * Fixes [issue 335](https://code.google.com/p/janus-ssp/issues/detail?id=335) Search all revisions for state, when searching for entities in an specific state
  * Added Estonian, Latvian, Lithuanian and limited Hungarian translation
  * Make JANUS enabled by default when installed
  * Update to config template
  * Updated the REST interface
  * Minor UI updates
  * Updated the install script

Please download and test. The final release is scheduled for the start of May.

## 28/11-2011 ##
JANUS has been released in version 1.10.3
  * Fixes [issue 294](https://code.google.com/p/janus-ssp/issues/detail?id=294) Fixes the fact that wrong certificates break the validation
  * Fixes [issue 295](https://code.google.com/p/janus-ssp/issues/detail?id=295) Fixed allow all/none buttons
  * Fixes [issue 296](https://code.google.com/p/janus-ssp/issues/detail?id=296) Removing calls to SimpleSAML\_Metadata\_SAMLParser::parseString() which did not expect a list of entity descriptors
  * Fixes [issue 299](https://code.google.com/p/janus-ssp/issues/detail?id=299) Exception is now thrown when certificate to be validated by cron is empty. This ensures further validating is skipped
  * Fixes [issue 300](https://code.google.com/p/janus-ssp/issues/detail?id=300) Unable to select a different value for select metadata values
  * Fixes [issue 301](https://code.google.com/p/janus-ssp/issues/detail?id=301) JSON import causes Fatal Error for 1.10 branch
  * Fixes [issue 302](https://code.google.com/p/janus-ssp/issues/detail?id=302) Fixed Expires header typo in rest utils
  * Fixes [issue 303](https://code.google.com/p/janus-ssp/issues/detail?id=303) Updated the SWF upload component
  * Fixes [issue 304](https://code.google.com/p/janus-ssp/issues/detail?id=304) All uploaded files are prepended with a timestamp to avoid file name collisions
  * Added Croatian translation to dashboard

## 7/11-2011 ##
JANUS has been released in version 1.10.2
  * Small language update
  * Added access control on entity status under federation tab
  * Added missing dictionary entry for admin\_delete in editentity
  * Fixed wrong internal variable name in Postmaster post method
  * Updates [issue 294](https://code.google.com/p/janus-ssp/issues/detail?id=294) Fixes most of the load errors by using the eid instead of the entityID for loading the entities.
  * Catch unhandled exception from certificate validation
  * Fixed bad array concatination and removed bad variable reuse
  * Fixes [issue 289](https://code.google.com/p/janus-ssp/issues/detail?id=289) Entity is missing if prettyname metadatafield is not present, this involved a refactor of `_loadEntities()` to group functionality instead of duplicating it, also it throws an exception now if loading faila
  * Removed wrong assert and change it to a method parameter typehint

## 28/10-2011 ##
JANUS has been released in version 1.10.1
  * Fixes [issue 290](https://code.google.com/p/janus-ssp/issues/detail?id=290) Only mark metadata fields with text type to be invalid if empty

## 24/10-2011 ##
JANUS has been released in version 1.10.0
  * Fixes [issue 187](https://code.google.com/p/janus-ssp/issues/detail?id=187) When an ARP is deleted, it is now only marked as deleted and left out when fetching the entire ARP list.
  * Fixes [issue 228](https://code.google.com/p/janus-ssp/issues/detail?id=228) Status tab in edit entity page
  * Fixes [issue 234](https://code.google.com/p/janus-ssp/issues/detail?id=234) "Create connection" and "Search" on dashboard view have been changed to a buttons
  * Fixes [issue 238](https://code.google.com/p/janus-ssp/issues/detail?id=238) Updated the documentation that shippes with JANUS
  * Fixes [issue 240](https://code.google.com/p/janus-ssp/issues/detail?id=240) Enable sort on pretty name for entities in Dashboard
  * Fixes [issue 243](https://code.google.com/p/janus-ssp/issues/detail?id=243) Also check the IdP WL/BL configuration in the isConnectionAllowed REST method
  * Fixes [issue 245](https://code.google.com/p/janus-ssp/issues/detail?id=245) Add support for metadata containing `EntitiesDescriptor` while importing metadata
  * Fixes [issue 247](https://code.google.com/p/janus-ssp/issues/detail?id=247) Importing / exporting ALL (even custom) entity metadata
  * Fixes [issue 249](https://code.google.com/p/janus-ssp/issues/detail?id=249) Focus on search field when Search is clicked. Also added a keyboard shortcutfor enabling search.
  * Fixes [issue 251](https://code.google.com/p/janus-ssp/issues/detail?id=251) Added support for signig certificate rollover
  * Fixes [issue 255](https://code.google.com/p/janus-ssp/issues/detail?id=255) Prepend the user ID to all messages generated in the system
  * Fixes [issue 258](https://code.google.com/p/janus-ssp/issues/detail?id=258) Display different error message if entity ID matches a previouse revision but the head. This is not an optimal solution, since the current entity that have used the entity ID can not be shown.
  * Fixes [issue 259](https://code.google.com/p/janus-ssp/issues/detail?id=259) Jump to edit entity wiev when creating new connection
  * Fixes [issue 260](https://code.google.com/p/janus-ssp/issues/detail?id=260) Remove the onFocus attribute when the onBlur event happens, so content of field is not cleared on next focus
  * Fixes [issue 262](https://code.google.com/p/janus-ssp/issues/detail?id=262) Updated the SWFupload plugin to version 2.2.0.1
  * Fixes [issue 263](https://code.google.com/p/janus-ssp/issues/detail?id=263) Added a configurable default value for subscribtion type
  * Fixes [issue 264](https://code.google.com/p/janus-ssp/issues/detail?id=264) Metadata field validation: length at least 20 characters
  * Fixes [issue 265](https://code.google.com/p/janus-ssp/issues/detail?id=265) Metadata field validation: e-mail address
  * Fixes [issue 266](https://code.google.com/p/janus-ssp/issues/detail?id=266) Show metdata that no longer has a definition
  * Fixes [issue 267](https://code.google.com/p/janus-ssp/issues/detail?id=267) Improve 'missing required metadata' error
  * Fixes [issue 268](https://code.google.com/p/janus-ssp/issues/detail?id=268) Editting Entities: Pre-add required metadata
  * Fixes [issue 269](https://code.google.com/p/janus-ssp/issues/detail?id=269) REST API produces blank error page without stack trace
  * Fixes [issue 270](https://code.google.com/p/janus-ssp/issues/detail?id=270) REST API should only return information about production
  * Fixes [issue 272](https://code.google.com/p/janus-ssp/issues/detail?id=272) Add methods to retrieve all allowed connections using one REST call (both IdP and SP)
  * Fixes [issue 274](https://code.google.com/p/janus-ssp/issues/detail?id=274) Error when cartData is not valid i Validate tab
  * Fixes [issue 275](https://code.google.com/p/janus-ssp/issues/detail?id=275) Error in metadata validation in Validate teb
  * Fixes [issue 277](https://code.google.com/p/janus-ssp/issues/detail?id=277) Checking if entityid is in use is checked when creating but not when updating entity
  * Fixes [issue 278](https://code.google.com/p/janus-ssp/issues/detail?id=278) Creating a new entity fails because sspmod\_janus\_Entity::load() does not accept [revision 0](https://code.google.com/p/janus-ssp/source/detail?r=0)
  * Fixes [issue 279](https://code.google.com/p/janus-ssp/issues/detail?id=279) `sspmod_janus_EntityController::setEntity()` either sets or creates an entity, this could be split up
  * Fixes [issue 282](https://code.google.com/p/janus-ssp/issues/detail?id=282) Changing workflowstate removes allowed connections
  * Fixes [issue 283](https://code.google.com/p/janus-ssp/issues/detail?id=283) Security: a user that does not have the rights to update entityid for a given workflow state may still do so by DOM manipulation
  * Fixes [issue 284](https://code.google.com/p/janus-ssp/issues/detail?id=284) There where an assignment between the temporary variable and the object variable.
  * Fixed focus on field for entityID when creating a new connection. Also added keyboard shortcut to toggle Create connection, Ctrl-c
  * Removed obsolete code for temporary fix for [issue 240](https://code.google.com/p/janus-ssp/issues/detail?id=240): Enable sort on pretty name for entities in Dashboard
  * Removed comment tokens in script tags, JANUS doesnt have to support browsers older than Netscape 2.0
  * Sort the ARP list in a natual case insensitive way.
  * Updated SQL script and upgrade notes
  * filter\_var's FILTER\_VALIDATE\_URL has an error that no not allow all valid URLs to pass through (https://bugs.php.net/bug.php?id=51192). Issue is fixed in PHP version 5.3.3.
  * Added check for the scheme part of the parsed URL, when deciding whether the URL is on HTTPS or not. scheme part is not always present when using parse\_url
  * Fixed issue where default value is not set on metadata field and default\_allow is set to false in metadatavalidation tab
  * Fixed several minor bugs
  * Code cleanup
  * Dictionary update

Please the see the [upgrade](upgradejanus.md) page on the wiki if upgrading an existing installation.

For complete changelog please see this [page](http://code.google.com/p/janus-ssp/source/list)

## 4/8-2011 ##
JANUS has been released in version 1.9.2
  * Added missing SPAN tag that is used as status target for field validation function
  * Fixed async file upload in metadata editor
  * Fixed wrongly placed " in JavaScript code

## 29/6-2011 ##
JANUS has been released in version 1.9.1
  * Fixed missing option for var\_export in Postman.php

## 21/3-2011 ##
JANUS has been released in version 1.9.0
  * Fixed error message when entity can not be loaded
  * Catch fatal exception if metadata parsed to the MetadataBuilder is not correct in order to keep exporting instead for failing
  * Initializa uninitialized required variable that causes notices, if no metadatafields are required
  * Language update
  * Put text in dictionary files
  * UI update to ARP and Inbox tabs
  * UI cleanup and CSS cleanup
  * Fixed alot of minor bugs
  * Added the prettyname of the entities in the admin tab
  * Fixed bug when importing cert in metadata
  * Code cleanup
  * Export the internal eid to metadata.
  * Fixed bug that also filters entities in the admin tab when searching in the mail tab
  * Added seperat permission on the admin -> users tab
  * Only display the entities the user has access to in the admin->connections tab.
  * Added access restrictions on experimental features
  * Added the ability to hook in external messengers, so delivery of messages to external systems are possible.
  * Added a SimpleMail to deliver messages to users email.
  * Added extra info the display of messages. Who instantiated the message and on what subscription did you recive it.
  * Updated Postman to automatically send to wildcard addresses, when sending to addresses that include ID's
  * Chenged the way the supported option works on metadata fields. Now you need to supply an # in the metadata name, which is then substituted to the values given in the supported option
  * Fixes 108 Addedthe ability to select all messages and the ability to mark all selected messages as read
  * Update [issue 149](https://code.google.com/p/janus-ssp/issues/detail?id=149) Moved metadata field description to a dictionary file
  * Fixes [issue 183](https://code.google.com/p/janus-ssp/issues/detail?id=183) Added the metalisting functionality from the YACO branch. NOTE that this extension is not yet done. Further more it relies on two experimental modules x509 and metadatalisting.
  * Fixes [issue 222](https://code.google.com/p/janus-ssp/issues/detail?id=222) Added correct check for valid entityid syntax to the edit entity view
  * Fixes [issue 224](https://code.google.com/p/janus-ssp/issues/detail?id=224) Minor update to the config file.
  * Fixes [issue 225](https://code.google.com/p/janus-ssp/issues/detail?id=225) Fixed markup errors
  * Fixes [issue 229](https://code.google.com/p/janus-ssp/issues/detail?id=229) Added the ability to search entityid and users ion the admin->entities tab
  * Fixes [issue 231](https://code.google.com/p/janus-ssp/issues/detail?id=231) Removed AccessBlocker from JANUS.
  * Fixes [issue 232](https://code.google.com/p/janus-ssp/issues/detail?id=232) Keep search box open on searches
  * Fixes [issue 233](https://code.google.com/p/janus-ssp/issues/detail?id=233) Changed "Create" to "Create connection"
  * Fixes [issue 237](https://code.google.com/p/janus-ssp/issues/detail?id=237) Updated the install script to reflect resent changes and some minor cleanups
  * Update [issue 240](https://code.google.com/p/janus-ssp/issues/detail?id=240) Added temporary fix for sorting entities in alphabetic order

Please the see the [upgrade](upgradejanus.md) page on the wiki if upgrading an existing installation.

For complete changelog please see this [page](http://code.google.com/p/janus-ssp/source/list)

## 15/3-2011 ##
JANUS v. 1.9.0 Release Candidate 1 has been released.

Please help us make JANUS better by installing, testing and reporting bugs.

You can find JANUS here: http://code.google.com/p/janus-ssp/ All bugs and feature requests can be reported here: http://code.google.com/p/janus-ssp/issues/

We would also very much appreciate help on translating JANUS to new languages and to keep the existing translation up to date. All translation are done though the Feide RnD Translation portal located here: https://translation.rnd.feide.no/ You can get a free Feide OpenIdP account and get started instantly.

NOTE to existing users:

If you are trying JANUS v. 1.9.0 Release Candidate 1 on existing data, please refer to the UPGRADE document shipped with JANUS for any changes.

If you have any additional questions or need help, please post the the simpleSAMLphp mailing list at simplesamlphp@googlegroups.com

Please note that JANUS v. 1.9.0-RC1 requires simpleSAMLphp v. 1.7.0 or higher.

For complete changelog please see this [page](http://code.google.com/p/janus-ssp/source/list)
### 7/3-2011 ###
JANUS has been released in version 1.8.0
  * Language updates
  * Update to build script and test script
  * Removed unused method getActiveUsers
  * Minor code cleanup in AccessBlocker filter
  * Added function comment to getARPlist function
  * Minor update to install script
  * Updates and cleanups in configuration file
  * Minor UI updates
  * Fixed missing return statements in Entity.php
  * Fixed bug when order is not set on metadta fields, that courses sorting function to give notices
  * Fixed bug when metadata field is not defined in configuration file
  * Fixed bug when workflow state is not defined in the configuration file
  * Fixed permission bug and cleanup in history.php
  * Fixed missing translation in editentity
  * Fixed missing translation in dashboard
  * Fixed minor issue in the error template
  * Fixed [issue 188](https://code.google.com/p/janus-ssp/issues/detail?id=188) Updated the SQL dump. The CHARSET has been changed to utf8
  * Fixes [issue 207](https://code.google.com/p/janus-ssp/issues/detail?id=207) Include correct name and organization info when importing and exporting metadata. Thanks to pitbulk for patching
  * Fixed [issue 209](https://code.google.com/p/janus-ssp/issues/detail?id=209) Whitlist entries are exported in SSP flatfile metadata and the AccessBlocker
  * Fixed [issue 210](https://code.google.com/p/janus-ssp/issues/detail?id=210) Update to logged info. Thanks to pitbulk for the patch
  * Fixed [issue 212](https://code.google.com/p/janus-ssp/issues/detail?id=212) Rest secret now editable in user dashboard
  * Fixes [issue 217](https://code.google.com/p/janus-ssp/issues/detail?id=217) Display proper error message when creating a new user in the dashboard and the user already exists
  * Fixes [issue 220](https://code.google.com/p/janus-ssp/issues/detail?id=220) Fixed bug in cron hook. Thanks to pitbulk for supplying a patch
  * Fixes [issue 221](https://code.google.com/p/janus-ssp/issues/detail?id=221) fixed bug when using integers for values in metadata. Thanks to pitbukl for reporting and supplying patch
  * Update [issue 222](https://code.google.com/p/janus-ssp/issues/detail?id=222) Changed error message when using wrong syntax for entityID
  * Update [issue 222](https://code.google.com/p/janus-ssp/issues/detail?id=222) Updated the check that validates the entityID in dashboard to allow absolute URI's.

Please note that JANUS version 1.8.0 requires simpleSAMLphp v. 1.7.0 or higher.

For complete changelog please see this [page](http://code.google.com/p/janus-ssp/source/list)
### 16/2-2011 ###
JANUS v. 1.8.0 Release Candidate 1 has been released.

Please help us make JANUS better by installing, testing and reporting bugs.

You can find JANUS here: http://code.google.com/p/janus-ssp/ All bugs and feature requests can be reported here: http://code.google.com/p/janus-ssp/issues/

We would also very much appreciate help on translating JANUS to new languages and to keep the existing translation up to date. All translation are done though the Feide RnD Translation portal located here: https://translation.rnd.feide.no/ You can get a free Feide OpenIdP account and get started instantly.

NOTE to existing users:

If you are trying JANUS v. 1.8.0 Release Candidate 1 on existing data, please note that some of the standard metadata fields have changed and some of the configuration options in the config file as well. Please refer to the UPGRADE document shipped with JANUS

If you have any additional questions or need help, please post the the simpleSAMLphp mailing list at simplesamlphp@googlegroups.com

Please note that JANUS v. 1.8.0-RC1 requires simpleSAMLphp v. 1.7.0 or higher.

For complete changelog please see this [page](http://code.google.com/p/janus-ssp/source/list)
### 3/12-2010 ###
JANUS has been released in version 1.7.2
  * Fixed bug in export entities
### 8/11-2010 ###
JANUS has been released in version 1.7.1
    * Fixed JSON syntax bug i dashboard and editentity
    * Fixed SQL bugs in AdminUtil
    * Code cleanup
    * Fixed UI bugs in dashboard and editentity
### 14/10-2010 ###
JANUS has been released in version 1.7.0
    * Added the ability to search for entities by metadata key=>value pair
    * Added ability to load an entity by only suppling the entityID
    * Update to importMetadataX functionality
    * Updated UPGRADE
    * Minor update to install script
    * Fix to enable empty arp in SSP flatfile metadata. This enables an entity to have zero attributes released instaed of all when using attributeLimit filter in SSP.
    * Fixed cache setting on metadata export and added configuration option for aggregator
    * Quick fix for error when trying to export entities with ARP that has been deleted
    * Update [issue 169](https://code.google.com/p/janus-ssp/issues/detail?id=169) Initial implementation of REST-ish API
    * Fixed [issue 131](https://code.google.com/p/janus-ssp/issues/detail?id=131) Added quick edit and add of ARPs in the editentity wiev.
    * Fixed [issue 154](https://code.google.com/p/janus-ssp/issues/detail?id=154) Added the ability to define a default ARP to be used if no ARP is selected
    * Fixed [issue 155](https://code.google.com/p/janus-ssp/issues/detail?id=155) When ARP is deleted, entities that uses that ARP defaults to "No ARP"
    * Fixed [issue 158](https://code.google.com/p/janus-ssp/issues/detail?id=158) Added ability to search for entities in the dasbord view. The search is done on the prettyname
    * Fixes [issue 161](https://code.google.com/p/janus-ssp/issues/detail?id=161) Only show pretty name if different from default value of prettyname field
    * Fixed [issue 162](https://code.google.com/p/janus-ssp/issues/detail?id=162) When changing type all metadata fields are removed and replaced with default fields for new type.
    * Fixes [issue 165](https://code.google.com/p/janus-ssp/issues/detail?id=165) Fixed error in the getRealPost function.
    * Fixes [issue 167](https://code.google.com/p/janus-ssp/issues/detail?id=167) Fixed syntax/typo fix for upgrade.php. Provided by Hans Zandbelt
    * Fixed [issue 170](https://code.google.com/p/janus-ssp/issues/detail?id=170) Fixed bug that do not display messages, error and others
    * Fixed [issue 171](https://code.google.com/p/janus-ssp/issues/detail?id=171) Increased area in the buttom of the page in the metadata tab to avoid tooltip flicking, when hovering over metadatafiels.
    * Fixed [issue 172](https://code.google.com/p/janus-ssp/issues/detail?id=172) Clear metadata when calling setEntity in EntityController
    * Fixed [issue 189](https://code.google.com/p/janus-ssp/issues/detail?id=189) Put config into textarea
### 19/7-2010 ###
JANUS has been released in version 1.6.0
    * Update to the upgrade script
    * Icon update
    * Added JANUS to translation portal@FEIDE
    * Fixed bug when creating new entity. Set the uid on the created entity
    * Removed blinker effect on save button in editentity
    * Fixed bug in allentities permission. Users who have allentities permission can now see edit screen for all entities
    * Added from YACO branch: Add two indexes for janusentity and janusmetadata to improve database performance
    * Added the ability to put miltiple usertypes on users. NOTE the ability to add multiple type is not supproted in the admin interface yet.
    * Fixed minor bug in exportmetadata related to danish chars
    * Update [issue 131](https://code.google.com/p/janus-ssp/issues/detail?id=131) Added a link to the ARP page.
    * Update [issue 137](https://code.google.com/p/janus-ssp/issues/detail?id=137) Added ability to filter entities on the dashboard to only show entities fra a given state
    * Fixes [issue 32](https://code.google.com/p/janus-ssp/issues/detail?id=32) Added ability to assign multiple user types to users
    * Fixes [issue 110](https://code.google.com/p/janus-ssp/issues/detail?id=110) Converted the dictionary file to new JSON format
    * Fixed [issue 112](https://code.google.com/p/janus-ssp/issues/detail?id=112) Remove code from old ARP editor together with some other code not used any more
    * Fixes [issue 116](https://code.google.com/p/janus-ssp/issues/detail?id=116) Added fix so POST array contains original key values
    * Fixes [issue 121](https://code.google.com/p/janus-ssp/issues/detail?id=121) Added extra parameter to the ticket login URL, to allow bypass of select page in multiauth authsource. NOTE this requires SSP [r2245](https://code.google.com/p/janus-ssp/source/detail?r=2245) or later.
    * Fixes [issue 122](https://code.google.com/p/janus-ssp/issues/detail?id=122) Added file metadatafield. The files will be uploaded to the upload directory under the www folder i a folder named with the eid of the entity as name, i.e. www/upload/3/
    * Fixes [issue 124](https://code.google.com/p/janus-ssp/issues/detail?id=124) Updated the import script and updated the config file template with new metadata fields names
    * Fixes [issue 126](https://code.google.com/p/janus-ssp/issues/detail?id=126) Metadatafields which should be exported as arrays is to be given inthe form key1:key2 etc.
    * Fixes [issue 127](https://code.google.com/p/janus-ssp/issues/detail?id=127) Added pointer curser when hovering above the edit and delete icon on the ARP page.
    * Fixes [issue 128](https://code.google.com/p/janus-ssp/issues/detail?id=128) Added access ontrol for access to all entities. Configer by setting permissions on 'allentities' in the access array
    * Fixes [issue 129](https://code.google.com/p/janus-ssp/issues/detail?id=129) Applied the post/redirect/get design pattern on the dashboard and the editentity screen
    * Fixes [issue 130](https://code.google.com/p/janus-ssp/issues/detail?id=130) The description of the metadata field is displayed when hovering above the field in the list
    * Fixes [issue 135](https://code.google.com/p/janus-ssp/issues/detail?id=135) Display the list of entities with its pretty name, if it exists. The metadata field used as pretty name is defined by setting the entity.prettynae option in the config file.
    * Fixes [issue 139](https://code.google.com/p/janus-ssp/issues/detail?id=139) Checkboxes (boolean field types) can not be changed if modifymetadata permission is set to false
    * Fixes [issue 142](https://code.google.com/p/janus-ssp/issues/detail?id=142) All exports fra the federation tab is shown directly without templates
    * Fixes [issue 140](https://code.google.com/p/janus-ssp/issues/detail?id=140) Added the user id after the revision note in the history wiev.
    * Fixes [issue 144](https://code.google.com/p/janus-ssp/issues/detail?id=144) Added the ability to change the entityID
    * Fixes [issue 148](https://code.google.com/p/janus-ssp/issues/detail?id=148) Added upgrade script, to be used for upgrading JANUS from 1.5 to 1.6 branch

### 18/5-2010 ###
JANUS has been released in version 1.5.3
  * Added ability to assign multiple user types to users
  * Added pointer curser when hovering above the edit and delete icon on the ARP page.
  * Fixed bug in 'allentities' access permission

### 7/5-2010 ###
JANUS has been released in version 1.5.2
  * Added a link to the ARP page.
  * Applied the post/redirect/get design pattern on the dashboard and the editentity screen
  * Added access control for access to all entities. Configer by setting permissions on 'allentities' in the access array
  * Added ability to export federation metadata in SSP flat file format
  * Fixed minor bug in exportmetadata related to danish chars

### 26/3-2010 ###
JANUS has been released in version 1.5.1
  * Fixed minor bug in exportmetadata related to danish chars
  * Improved perfomance on editentity page by delaying loading the entity history
  * Fixed bug in metadatafield names.
  * Fixed bug in handling of boolean metadatafields.
  * Added script for importing exsisting SimpleSAMLphp metadata into JANUS
  * Fixed minor bug in ARP editor

### 1/3-2010 ###
JANUS has been released in version 1.5.0
  * Require SimpleSAMLphp version 1.5
  * Minor update to the inbox
  * Minor update to access control
  * Minor UI updates
  * Added new ARP editor
  * Added url checking to metadata editor
  * Added 'cacheDuration' and 'validUntil' parameters to EntitiesDescriptor-Metadata because Shibboleth SP requires it.
  * Added name and extension to the file that exportentities.php exports.
  * Several bugfixes

### 4/12-2009 ###
JANUS has been released in version 1.4.0
  * Added resent spanish translation
  * Various fixes to support resent changes in SimpleSAMLphp
  * Various UI bugs fixed and moved all css to external file.
  * Code cleanup
  * Added consent disabling functionality.
  * Added cron hook to automatically fetch metadata for entities
  * Added metadata URL to entitites.
  * Added 'select' type to the metadata types.
  * Added backport of json\_encode to support PHP < 5.2
  * Added pagination to inbox tab
  * Updated webinstaller
  * Updated mailtoken authsource
  * Updated message system
  * Updated federation metadata export tab
  * Updated metadata export functionality
  * Several bugfixes

### 30/10-2009 ###
JANUS has been released in version 1.3.0.
  * Updated web installer
  * Added simple ARP editor for shib and saml sp
  * Added shib entities to list of blockedable entities
  * Added support for importing metadat via an URL
  * Remove dependency on Mailtoken authsource
  * Added support for adding multiple metadata fields
  * Added suport for exporting federated metadata
  * Updated the message system
  * Variuos layout updates
  * Various cleanups
  * Several bugfixes
### 28/10-2009 ###
Today we have started a closer cooperation with Yaco Sistemas. They will contribute to the project as they build the Andalusian federation. Welcome to
  * Lorenzo Gil, lorenzo.gil.sanchez@gmail.com
  * Ernesto Revilla, ernesto.revilla@gmail.com
  * Sixto Martin, pitbulk@gmail.com
### 25/9-2009 ###
JANUS has been released in version 1.2.0.
  * Added simple notification system to enable users to be notified on changes to entities
  * Updated connection table in dashboard to support more that two types of connection
  * Visual update to dashboard and entity editor
  * Added ability to edit and add new users to admin interface functionality
  * Added support for spanish
  * Several bugfixes

See the CHANGES file for complete list of changes
### 28/8-2009 ###
JANUS v. 1.1.1 has been released.
  * Updated web installer
### 24/8-2009 ###
JANUS v. 1.1.0 has been released. The key features of JANUS are:
  * Token based mail notification for account creation and system login
  * Creating / deleting SAML 2.0 entities (Service providers, Identy providers)
  * Ability to change entity type for existing entities
  * Support for multiple independant system states, enabling workflow and separation of permission schemes
  * Ability to block remote entities
  * Creation, modification and deletion og metadata enties
  * Import of SAML 2.0 metadata
  * Revision control including revision notes and backtracking
  * Export of SAML 2.0 metadata
  * Deletion of users
  * Adding and removing user permissions on entities
### 10/7-2009 ###
The Softwarebørsen release is now out

&lt;wiki:gadget url="http://www.ohloh.net/p/janus-ssp/widgets/project\_basic\_stats.xml" height="250" border="1" /&gt;
&lt;wiki:gadget url="http://www.ohloh.net/p/326912/widgets/project\_languages.xml" border="0"/ width="400" height="250"&gt;