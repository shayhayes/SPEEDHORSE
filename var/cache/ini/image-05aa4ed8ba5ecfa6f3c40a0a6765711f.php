<?php
// This is a auto generated ini cache file, time created:Wed, 14 Sep 11 14:50:59 +0000
$data = array(
'rev' => 2,
'created' => '2011-09-14T14:50:59+00:00',
'charset' => "utf-8",
'files' => array (0 => 'settings/image.ini',1 => 'settings/siteaccess/ezflow_site_user/image.ini.append.php',2 => 'extension/ezoe/settings/image.ini.append.php',3 => 'extension/ezie/settings/image.ini.append.php',4 => 'extension/ezflow/settings/image.ini.append.php',5 => 'extension/ezmultiupload/settings/image.ini.append.php',6 => 'settings/override/image.ini.append.php',
),
'file' => 'settings/image.ini',
'val' => array ('GDSettings' => array ('HasGD2' => 'false',),'FileSettings' => array ('TemporaryDir' => 'imagetmp','PublishedImages' => 'images','VersionedImages' => 'images-versioned','DirPermissions' => '0777','ImagePermissions' => '0666',),'OutputSettings' => array ('AllowedOutputFormat' => array (0 => 'image/jpeg',1 => 'image/png',2 => 'image/gif',),),'AliasSettings' => array ('AliasList' => array (0 => 'small',1 => 'medium',2 => 'listitem',3 => 'articleimage',4 => 'articlethumbnail',5 => 'gallerythumbnail',6 => 'galleryline',7 => 'imagelarge',8 => 'large',9 => 'rss',10 => 'logo',11 => 'infoboximage',12 => 'billboard',13 => 'small_feature',14 => 'big_add',15 => 'small_add',16 => 'small_advertisment',17 => 'small_blog',18 => 'classifylisting_img',19 => 'product_img',20 => 'bigadd_img',21 => 'frontproduct_img',22 => 'blog_img',23 => 'artical_img',24 => 'partner_img',25 => 'racingnewspecial_img',26 => 'racingnewstwopost_img',27 => 'racingnewstwopost_img',28 => 'mediapreview',29 => 'mediaphoto_img',30 => 'eventphoto_img',31 => 'shopfeaturetop_img',32 => 'shopfeatureproduct_img',33 => 'shopfeatureproductright_img',34 => 'shoptopseller_img',35 => 'article_inner_img',36 => 'blog_inner_img',37 => 'classify_listing_img',38 => 'blogsponsor_img',39 => 'articalsponsor_img',40 => 'mainstory1',41 => 'mainstory2',42 => 'mainstory3',43 => 'block2items1',44 => 'block2items2',45 => 'block3items3',46 => 'blockgallery1',47 => 'imagelarge',48 => 'multiuploadthumbnail',),),'reference' => array ('Filters' => array (0 => 'geometry/scaledownonly=600;600',),),'small' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=100;160',),),'small_feature' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=550;730',),),'tiny' => array ('Reference' => 'reference','Filters' => array (0 => 'geometry/scaledownonly=30;30',),),'medium' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=200;290',),),'large' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=360;440',),),'rss' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=88;31',),),'MIMETypeSettings' => array ('OverrideList' => array (0 => 'AnimatedGIF',1 => 'LayeredPhotoshop',),'Quality' => array (0 => 'image/jpeg;75',),'ConversionRules' => array (0 => 'image/gif;image/png',1 => 'image/x-xpixmap;image/png',2 => '*;image/jpeg',),),'AnimatedGIF' => array ('MIMEType' => 'image/gif','Match' => array ('is_animated' => '1',),'OverrideMIMEType' => 'animation/gif','DisallowedFilters' => array (0 => '*',),'ExtraFilters' => array (),),'LayeredPhotoshop' => array ('MIMEType' => 'application/x-photoshop','ExtraFilters' => array (0 => 'flatten',1 => 'resize=200x',),),'ShellSettings' => array ('ConvertPath' => '',),'ImageConverterSettings' => array ('ImageConverters' => array (0 => 'ImageMagick',1 => 'GD',),'LockTimeout' => '60',),'GD' => array ('Name' => 'GD','IsEnabled' => 'true','Handler' => 'eZImageGDFactory',),'ImageMagick' => array ('Name' => 'ImageMagick','IsEnabled' => 'true','Handler' => 'eZImageShellFactory','ExecutablePath' => '/usr/bin','Executable' => 'convert','PreParameters' => '','PostParameters' => '','UseTypeTag' => ':','InputMIMEList' => array (0 => '*',),'OutputMIMEList' => array (0 => '*',),'QualityParameters' => array (0 => 'image/jpeg;-quality %1',),'FrameRangeParameters' => array (0 => 'application/x-photoshop;[0]',),'Filters' => array (0 => 'geometry/scale=-geometry %1x%2',1 => 'geometry/scalewidth=-geometry %1',2 => 'geometry/scaleheight=-geometry x%1',3 => 'geometry/scaledownonly=-geometry %1x%2>',4 => 'geometry/scalewidthdownonly=-geometry %1>',5 => 'geometry/scaleheightdownonly=-geometry x%1>',6 => 'geometry/scaleexact=-geometry %1x%2!',7 => 'geometry/scalepercent=-geometry %1x%2%',8 => 'geometry/crop=-crop %1x%2+%3+%4',9 => 'filter/noise=-noise %1',10 => 'filter/swirl=-swirl %1',11 => 'colorspace/gray=-colorspace GRAY',12 => 'colorspace/transparent=-colorspace Transparent',13 => 'colorspace=-colorspace %1',14 => 'border=-border %1x%2',15 => 'border/color=-bordercolor rgb(%1,%2,%3)',16 => 'border/width=-borderwidth %1',17 => 'flatten=-flatten',18 => 'resize=-resize %1',),'MIMETagMap' => array (0 => 'image/x-xpixmap;XPM',1 => 'image/png;PNG',2 => 'image/jpeg;JPEG',3 => 'image/bmp;BMP',4 => 'image/gif;GIF',5 => 'image/x-portable-bitmap;PBM',6 => 'image/tiff;TIFF',7 => 'image/pcx;PCX',8 => 'image/x-pict;PICT',9 => 'image/svg+xml;SVG',10 => 'image/tga;TGA',11 => 'image/vnd.wap.wbmp;WBMP',12 => 'image/x-xbitmap;XBM',13 => 'image/x-xcf-gimp;XCF',14 => 'application/x-photoshop;PSD',15 => 'application/pdf;PDF',16 => 'application/postscript;PS',17 => 'text/plain;TEXT',),),'AnalyzerSettings' => array ('RepositoryList' => array (0 => 'lib/ezimage/classes',),'ExtensionList' => array (),'ImageAnalyzers' => array (0 => 'GIF',1 => 'EXIF',),'ImageAnalyzerAlias' => array (),'AnalyzerMIMEList' => array (0 => 'image/gif',),),'GIFAnalyzer' => array ('Handler' => 'ezgif','MIMEList' => array (0 => 'image/gif',),),'EXIFAnalyzer' => array ('Handler' => 'ezexif','MIMEList' => array (0 => 'image/jpeg',1 => 'image/tiff',),),'imagelarge' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=448;622',),),'logo' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaleheight=36',),),'listitem' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=130;190',),),'articleimage' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=170;350',),),'articlethumbnail' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=70;150',),),'gallerythumbnail' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=105;100',),),'galleryline' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=70;150',),),'big_add' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=250!;250!',),),'small_add' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=250!;100!',),),'small_advertisment' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=300!;100!',),),'small_blog' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=80',),),'classifylisting_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=246!;180!',),),'infoboximage' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=75',),),'billboard' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=764',),),'product_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=329!;240!',),),'bigadd_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=300!;250!',),),'frontproduct_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=130!;100!',),),'blog_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=87!;100!',),),'artical_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=80!;80!',),),'partner_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=90!;90!',),),'racingnewspecial_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=300!;222!',),),'racingnewstwopost_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=300!;186!',),),'mediapreview' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=195!;144!',),),'mediaphoto_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=300!;144!',),),'eventphoto_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=130!;100!',),),'shopfeaturetop_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=460!;175!',),),'shopfeatureproduct_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=140!;140!',),),'shopfeatureproductright_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=220!;102!',),),'shoptopseller_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=60!;60!',),),'article_inner_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=307!;255!',),),'blog_inner_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=264!;214!',),),'classify_listing_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=94!;69!',),),'articalsponsor_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=155!;28!',),),'blogsponsor_img' => array ('Reference' => '','Filters' => array (0 => 'geometry/scale=105!;20!',),),'eZIE' => array ('watermarks' => array (0 => 'elephpant.png',1 => 'ez-logo.png',),),'mainstory1' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=468',1 => 'geometry/crop=468;396;0;0',),),'mainstory2' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=439',1 => 'geometry/crop=439;233;0;0',),),'mainstory3' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=201',1 => 'geometry/crop=201;239;0;0',),),'block2items1' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=195',1 => 'geometry/crop=195;98;0;0',),),'block2items2' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=195',1 => 'geometry/crop=195;98;0;0',),),'block3items3' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=195',1 => 'geometry/crop=195;98;0;0',),),'blockgallery1' => array ('Reference' => '','Filters' => array (0 => 'geometry/scalewidth=126',1 => 'geometry/crop=126;84;0;0',),),'multiuploadthumbnail' => array ('Reference' => '','Filters' => array (0 => 'geometry/scaledownonly=100;80',),),
));
?>