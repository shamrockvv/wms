Requirements
--------------
Yii 1.1.x or above


Description:
--------------
This extension just extend from {link: CClientScript} using few codes, it will allow you to automatically combine all script files and css files into a single (or several) script or css files.

Basically this will reduce the HTTP calls for resources files by merging several resources files into a single (or more) files.

It can automatically detect the required list of files, and generate a unique filename hash, so boldly ease of use.

Since version of 1.5, also support conditional loading js/css file in IE browser, see example codes please.

####Css Files:
CSS files are merged based on there media attribute, background images with a relative path in file can also be displayed correctly.

####Script files:
Script files are merged based on their position, If you use the 'CClientScript::POS_HEAD' you will end up with a single file for all the script files you've used on that page.

If you use 'CClientScript::POS_HEAD' and 'CClientScript::POS_END' for example then you'll end up with two files for each page on that request, Since those resources are located in different positions.

####File optmization or compress (EXPERIMENTAL, @since: 1.1)

[CssMin](http://code.google.com/p/cssmin/) used to optmize merged css file. You can set property 'optmizeCssFiles' of the component to enable this feature.
[JSMinPlus](http://crisp.tweakblogs.net/blog/1856/jsmin+-version-13.html) used to optimize merged script file. You can set property 'optmizeScriptFiles' of the component to enable this feature.

Usage:
---------------

1. Using this extension is as simple as adding the following code to the application configuration under the components array:

~~~
[php]
  'clientScript' => array(
    'class' => 'ext.minify.EClientScript',
    'combineScriptFiles' => !YII_DEBUG, // By default this is set to true, set this to true if you'd like to combine the script files
    'combineCssFiles' => !YII_DEBU, // By default this is set to true, set this to true if you'd like to combine the css files
    'optimizeScriptFiles' => !YII_DEBU,	// @since: 1.1
    'optimizeCssFiles' => !YII_DEBU, // @since: 1.1
  ),
~~~

Then you'd use the regular 'registerScriptFile' & 'registerCssFile' methods as normal and the files will be combined automatically.

2. Using to conditional loading js/css file for IE browser, you just need to specify the media property.

~~~
[php]
$cs = Yii::app()->clientScript;

// result to: <!--[if lt IE 9]><script src="/js/html5.js"></script><![endif]-->
$cs->registerScriptFile('/js/html5.js', CClientScript::POS_HEAD, array('media' => 'lt IE 9'));

// result to: <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="bootstrap/css/ie.css" /><![endif]-->
$cs->registerCssFile('/css/ie.css', 'lte IE 6');

~~~


NOTE:
---------------
If you registered some external resource files that not in the web application root directory, they will be kept and not combined.
Compression or optmization is a EXPERIMENTAL feature, please use it carefully(@since: 1.1)


ChangesLog:
---------------

**Mar 29, 2013**
- New version number 1.5
- Compatiable with the 3rd parameter of `registerScript` and `registerScriptFile`
- Add support for conditional loading js/css file in IE.
- Prepend the base url of current request when register a script/css file with relative path

**Mar 27, 2013** (by 
- New version number 1.4
- update JSMinPlus, CssMin
- use stronger hash for file names
- consider modification time for calculating hash
- enable all features by default

**Dec 06, 2010**
- Fixed problem for css files that begin with `@charset "xxx"`, it should be in the first line of file and not repeatly.
- Add support for theme resource files.

**Nov 23, 2010**
- Skip the minimization of files whose names include `.pack.`
- Add the last modification time as the QUERY_STRING to merged file, to avoid not properly flush the browser cache when the file updated.

**Nov 6, 2010**
- New version number 1.3
- Not repeat the minimization of Javascript codes those who have been minimized, whose names include `.min.`
- Fixed `getRelativeUrl()` platform compatibility issue. (thanks to Troto)


Known Issues:
----------------
When some resource files can not be merged and they are strictly dependent on loading order, then may have some problem.


Reporting Issue:
-----------------
Reporting Issues and comments are welcome, plz report them to offical forum of Yii.
[Report issue](http://www.yiiframework.com/forum/index.php?/topic/12476-extension-eclientscript/)
