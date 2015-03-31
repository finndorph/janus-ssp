# Metadata export configuration options #

The following is a complete list of all allowed configurations options for the metadata exporter in JANUS.


---


#### _array_ `types` ####
| The connection types to be exported |
|:------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'types' =&gt; array('saml20-sp'. 'shib13-sp'),<br>
</code></pre>
</td></tr>


---


#### _array_ `states` ####
| The connection states to be exported |
|:-------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'states' =&gt; array('prod-accepted'. 'qa-accepted'),<br>
</code></pre>
</td></tr>


---


#### _string_ `mime` ####
| Defines the mime type of the exported metadata. Only values defined in `mdexport.allowed_mime` is allowed |
|:----------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'mime' =&gt; 'application/xml',<br>
</code></pre>
</td></tr>


---


#### _array_ `exclude` ####
| Array of entityIDs for connections that should be excluded from the metadata export|
|:-----------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'exclude' =&gt; array('https://example.org/saml/metadata.xml'),<br>
</code></pre>
</td></tr>


---


#### _string_ `postprocessor` ####
| Defines which post processor the metadata should be run through. You can only select post processors which have been defined in the [mdexport.postprocessor](MetadataExport111#Configuring_a_post_processor.md) array. |
|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'exclude' =&gt; array('https://example.org/saml/metadata.xml'),<br>
</code></pre>
</td></tr>


---


#### _string_ `entitiesDescriptorName` ####
| Defines the title of the generated metadata. The title is put in the `Name` attribute of the containing `EntitiesDescriptor |
|:----------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'entitiesDescriptorName' =&gt; 'Sample Federation',<br>
</code></pre>
</td></tr>


---


#### _string_ `filename` ####
| Defines the name of the file that is returned. Setting this option results in the `Content-Disposition: attachment;` header being set with the given filename. |
|:---------------------------------------------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'filename' =&gt; 'federation-metadata.xml',<br>
</code></pre>
</td></tr>


---


#### _int_ `maxCache` ####
| Defines the content of the `cacheDuration` attribute on the containing `EntitiesDescriptor` and all subsequent `EntityDescriptor` elements. |
|:--------------------------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'maxCache' =&gt; 60*60*24,<br>
</code></pre>
</td></tr>


---


#### _int_ `maxDuration` ####
| Defines the content of the `validUntil` attribute on the containing `EntitiesDescriptor` and all subsequent `EntityDescriptor` elements. |
|:-----------------------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'validUntil' =&gt; 60*60*24*7,<br>
</code></pre>
</td></tr>


---


#### _boolean_ `sign.enable` ####
| Enables signing of the exported metadata. |
|:------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'sign.enable' =&gt; TRUE,<br>
</code></pre>
</td></tr>


---


#### _string_ `sign.privatekey` ####
| The name of the file containing the private key used for signing the exported metadata. **NOTE** the file must be placed in the `cert` directory in the hosting simpleSAMLphp installation. |
|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'sign.privatekey' =&gt; 'sample_server.pem',<br>
</code></pre>
</td></tr>


---


#### _string_ `sign.privatekey_pass` ####
| the password for unlocking the private key used for signing the exported metadata. Do not set or set to `null` if private key is not protected by a password. |
|:--------------------------------------------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'sign.privatekey_pass'   =&gt; 'VERY_SECRET_PASSWORD',<br>
</code></pre>
</td></tr>


---


#### _string_ `sign.certificate` ####
| The name of the file containing the public key used for signing the exported metadata. **NOTE** the file must be placed in the `cert` directory in the hosting simpleSAMLphp installation. |
|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
<tr><td>
<b>Example</b>
<pre><code>'sign.certificate' =&gt; 'sample_server.crt',<br>
</code></pre>
</td></tr>