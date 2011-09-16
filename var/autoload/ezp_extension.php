<?php
/**
 * Autoloader definition for eZ Publish Extension files.
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://ez.no/software/proprietary_license_options/ez_proprietary_use_license_v1_0 eZ Proprietary Use License v1.0
 * @version 4.5.0
 * @package kernel
 *
 */

return array(
      'Botr_API'                            => 'extension/multimedia/classes/botr_api.php',
      'EnchantSpell'                        => 'extension/ezoe/modules/ezoe/classes/EnchantSpell.php',
      'GoogleSpell'                         => 'extension/ezoe/modules/ezoe/classes/GoogleSpell.php',
      'INGConnectAuthInterface'             => 'extension/ngconnect/classes/ingconnectauthinterface.php',
      'JSMin'                               => 'extension/ezjscore/lib/jsmin.php',
      'JSMinException'                      => 'extension/ezjscore/lib/jsmin.php',
      'Moxiecode_JSON'                      => 'extension/ezoe/modules/ezoe/classes/utils/mcejson.php',
      'Moxiecode_JSONReader'                => 'extension/ezoe/modules/ezoe/classes/utils/mcejson.php',
      'OAuthConsumer'                       => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthDataStore'                      => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthException'                      => 'extension/ngconnect/classes/lib/OAuth.php',
      'OAuthJsonException'                  => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthPhpException'                   => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthRequest'                        => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthServer'                         => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthSignatureMethod'                => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthSignatureMethod_HMAC_SHA1'      => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthSignatureMethod_PLAINTEXT'      => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthSignatureMethod_RSA_SHA1'       => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthToken'                          => 'extension/ez_network/lib/oauth/OAuth.php',
      'OAuthUtil'                           => 'extension/ez_network/lib/oauth/OAuth.php',
      'PSpell'                              => 'extension/ezoe/modules/ezoe/classes/PSpell.php',
      'PSpellShell'                         => 'extension/ezoe/modules/ezoe/classes/PSpellShell.php',
      'ReCaptchaResponse'                   => 'extension/ezcomments/classes/recaptchalib.php',
      'SmartShortOperator'                  => 'extension/smartshort/autoloads/eztemplatesmartshortoperator.php',
      'SpellChecker'                        => 'extension/ezoe/modules/ezoe/classes/SpellChecker.php',
      'TemplateWord_cutOperator'            => 'extension/wordCut/templateword_cutoperator.php',
      'TumblrOAuth'                         => 'extension/ngconnect/classes/lib/tumblroauth.php',
      'TwitterOAuth'                        => 'extension/ngconnect/classes/lib/twitteroauth.php',
      'botr_apiOperator'                    => 'extension/multimedia/operators/botr_api.php',
      'eZArchive'                           => 'extension/ezwebin/autoloads/ezarchive.php',
      'eZContentClassEditDeferredHandler'   => 'extension/ezscriptmonitor/classes/ezcontentclasseditdeferredhandler.php',
      'eZContentNodeLightboxObjectItem'     => 'extension/ezlightbox/lightboxitems/ezcontentnodelightboxitem.php',
      'eZContentObjectLightboxObjectItem'   => 'extension/ezlightbox/lightboxitems/ezcontentobjectlightboxitem.php',
      'eZCreateClassListGroups'             => 'extension/ezwt/autoloads/ezcreateclasslistgroups.php',
      'eZFeedReader'                        => 'extension/ezflow/autoloads/ezfeedreader.php',
      'eZFindElevateConfiguration'          => 'extension/ezfind/classes/ezfindelevateconfiguration.php',
      'eZFindInfo'                          => 'extension/ezfind/ezinfo.php',
      'eZFindResultNode'                    => 'extension/ezfind/classes/ezfindresultnode.php',
      'eZFindResultObject'                  => 'extension/ezfind/classes/ezfindresultobject.php',
      'eZFindServerCallFunctions'           => 'extension/ezfind/classes/ezfindservercallfunctions.php',
      'eZFlowAjaxContent'                   => 'extension/ezflow/classes/ezflowajaxcontent.php',
      'eZFlowBlock'                         => 'extension/ezflow/classes/ezflowblock.php',
      'eZFlowFetchInterface'                => 'extension/ezflow/classes/ezflowfetchinterface.php',
      'eZFlowFunctionCollection'            => 'extension/ezflow/modules/ezflow/functioncollection.php',
      'eZFlowKeywordsFetch'                 => 'extension/ezflow/classes/fetches/ezflowkeywordsfetch.php',
      'eZFlowLatestContent'                 => 'extension/ezflow/classes/fetches/ezflowlatestcontent.php',
      'eZFlowLatestObjects'                 => 'extension/ezflow/classes/fetches/ezflowlatestobjects.php',
      'eZFlowMCFetch'                       => 'extension/ezflow/classes/fetches/ezflowmcfetch.php',
      'eZFlowOperations'                    => 'extension/ezflow/classes/ezflowoperations.php',
      'eZFlowPool'                          => 'extension/ezflow/classes/ezflowpool.php',
      'eZFlowPoolItem'                      => 'extension/ezflow/classes/ezflowpoolitem.php',
      'eZFlowServerCallFunctions'           => 'extension/ezflow/classes/ezflowservercallfunctions.php',
      'eZGmapLocation'                      => 'extension/ezgmaplocation/classes/ezgmaplocation.php',
      'eZGmapLocationInfo'                  => 'extension/ezgmaplocation/ezinfo.php',
      'eZGmapLocationType'                  => 'extension/ezgmaplocation/datatypes/ezgmaplocation/ezgmaplocationtype.php',
      'eZHTTPCacheManager'                  => 'extension/ezflow/classes/ezhttpcachemanager.php',
      'eZHTTPCacheManagerInterface'         => 'extension/ezflow/classes/ezhttpcachemanagerinterface.php',
      'eZIEEzcConversions'                  => 'extension/ezie/classes/interfaces/conversions.php',
      'eZIEEzcGDHandler'                    => 'extension/ezie/classes/handlers/gd.php',
      'eZIEEzcImageMagickHandler'           => 'extension/ezie/classes/handlers/magick.php',
      'eZIEImageAction'                     => 'extension/ezie/classes/image_action.php',
      'eZIEImageAnalyzer'                   => 'extension/ezie/classes/image_analyzer.php',
      'eZIEImageFilterBW'                   => 'extension/ezie/classes/image_filter_bw.php',
      'eZIEImageFilterBrightness'           => 'extension/ezie/classes/image_filter_brightness.php',
      'eZIEImageFilterContrast'             => 'extension/ezie/classes/image_filter_contrast.php',
      'eZIEImageFilterSepia'                => 'extension/ezie/classes/image_filter_sepia.php',
      'eZIEImagePreAction'                  => 'extension/ezie/classes/image_pre_action.php',
      'eZIEImageToolCrop'                   => 'extension/ezie/classes/image_tool_crop.php',
      'eZIEImageToolFlipHorizontally'       => 'extension/ezie/classes/image_tool_flip_horizontally.php',
      'eZIEImageToolFlipVertically'         => 'extension/ezie/classes/image_tool_flip_vertically.php',
      'eZIEImageToolPixelate'               => 'extension/ezie/classes/image_tool_pixelate.php',
      'eZIEImageToolResize'                 => 'extension/ezie/classes/image_tool_resize.php',
      'eZIEImageToolRotation'               => 'extension/ezie/classes/image_tool_rotation.php',
      'eZIEImageToolWatermark'              => 'extension/ezie/classes/image_tool_watermark.php',
      'eZIEezcImageConverter'               => 'extension/ezie/classes/image_converter.php',
      'eZInitializeTools'                   => 'extension/ez_network/scripts/initialize.php',
      'eZJSON'                              => 'extension/ezflow/autoloads/ezjson.php',
      'eZKeywordList'                       => 'extension/ezwebin/autoloads/ezkeywordlist.php',
      'eZLightBoxWrapperType'               => 'extension/ezlightbox/datatypes/ezlightboxwrapper/ezlightboxwrappertype.php',
      'eZLightbox'                          => 'extension/ezlightbox/classes/ezlightbox.php',
      'eZLightboxAccess'                    => 'extension/ezlightbox/classes/ezlightboxaccess.php',
      'eZLightboxObject'                    => 'extension/ezlightbox/classes/ezlightboxobject.php',
      'eZLightboxObjectItem'                => 'extension/ezlightbox/classes/ezlightboxobjectitem.php',
      'eZMultiuploadHandler'                => 'extension/ezmultiupload/classes/ezmultiuploadhandler.php',
      'eZMultiuploadHandlerInterface'       => 'extension/ezmultiupload/classes/ezmultiuploadhandlerinterface.php',
      'eZNetAgreementDEPRECATED'            => 'extension/ez_network/classes/network/eznetagreement.php',
      'eZNetBinaryPatchElement'             => 'extension/ez_network/classes/network/eznetbinarypatchelement.php',
      'eZNetBranch'                         => 'extension/ez_network/classes/network/eznetbranch.php',
      'eZNetClientInfo'                     => 'extension/ez_network/classes/eznetclientinfo.php',
      'eZNetCrypt'                          => 'extension/ez_network/classes/network/eznetcrypt.php',
      'eZNetEvent'                          => 'extension/ez_network/classes/network/eznetevent.php',
      'eZNetEventResult'                    => 'extension/ez_network/classes/network/ezneteventresult.php',
      'eZNetFilePatchElement'               => 'extension/ez_network/classes/network/eznetfilepatchelement.php',
      'eZNetInstallation'                   => 'extension/ez_network/classes/network/eznetinstallation.php',
      'eZNetInstallationAgreement'          => 'extension/ez_network/classes/network/eznetinstallationagreement.php',
      'eZNetInstallationInfo'               => 'extension/ez_network/classes/network/eznetinstallationinfo.php',
      'eZNetLargeObject'                    => 'extension/ez_network/classes/network/eznetlargeobject.php',
      'eZNetLargeObjectStorage'             => 'extension/ez_network/classes/network/eznetlargeobjectstorage.php',
      'eZNetModuleBranch'                   => 'extension/ez_network/classes/network/eznetmodulebranch.php',
      'eZNetModuleBranchDependency'         => 'extension/ez_network/classes/network/eznetmodulebranchdependency.php',
      'eZNetModuleInstallation'             => 'extension/ez_network/classes/network/eznetmoduleinstallation.php',
      'eZNetModulePatch'                    => 'extension/ez_network/classes/network/eznetmodulepatch.php',
      'eZNetModulePatchItem'                => 'extension/ez_network/classes/network/eznetmodulepatchitem.php',
      'eZNetMonitor'                        => 'extension/ez_network/classes/eznetmonitor.php',
      'eZNetMonitorGroup'                   => 'extension/ez_network/classes/network/eznetmonitorgroup.php',
      'eZNetMonitorItem'                    => 'extension/ez_network/classes/network/eznetmonitoritem.php',
      'eZNetMonitorResult'                  => 'extension/ez_network/classes/network/eznetmonitorresult.php',
      'eZNetMonitorResultValue'             => 'extension/ez_network/classes/network/eznetmonitorresultvalue.php',
      'eZNetNWTools'                        => 'extension/ez_network/classes/network/eznetnwtools.php',
      'eZNetPatch'                          => 'extension/ez_network/classes/network/eznetpatch.php',
      'eZNetPatchBase'                      => 'extension/ez_network/classes/network/eznetpatchbase.php',
      'eZNetPatchElement'                   => 'extension/ez_network/classes/network/eznetpatchelement.php',
      'eZNetPatchElementDecorator'          => 'extension/ez_network/classes/network/eznetpatchelementdecorator.php',
      'eZNetPatchInstruction'               => 'extension/ez_network/classes/network/eznetpatchinstruction.php',
      'eZNetPatchItem'                      => 'extension/ez_network/classes/network/eznetpatchitem.php',
      'eZNetPatchItemBase'                  => 'extension/ez_network/classes/network/eznetpatchitembase.php',
      'eZNetPatchParser'                    => 'extension/ez_network/classes/network/eznetpatchparser.php',
      'eZNetPatchSQLStatus'                 => 'extension/ez_network/classes/network/eznetpatchsqlstatus.php',
      'eZNetSOAPLog'                        => 'extension/ez_network/classes/network/eznetsoaplog.php',
      'eZNetSOAPObject'                     => 'extension/ez_network/classes/network/eznetsoapobject.php',
      'eZNetSOAPSync'                       => 'extension/ez_network/classes/network/eznetsoapsync.php',
      'eZNetSOAPSyncAdvanced'               => 'extension/ez_network/classes/network/eznetsoapsyncadvanced.php',
      'eZNetSOAPSyncClient'                 => 'extension/ez_network/classes/network/eznetsoapsyncclient.php',
      'eZNetSOAPSyncManager'                => 'extension/ez_network/classes/network/eznetsoapsyncmanager.php',
      'eZNetSQLPatchElement'                => 'extension/ez_network/classes/network/eznetsqlpatchelement.php',
      'eZNetScriptEvent'                    => 'extension/ez_network/classes/network/eznetscriptevent.php',
      'eZNetScriptPatchElement'             => 'extension/ez_network/classes/network/eznetscriptpatchelement.php',
      'eZNetStorage'                        => 'extension/ez_network/classes/network/eznetstorage.php',
      'eZNetTrigger'                        => 'extension/ez_network/classes/network/eznettrigger.php',
      'eZNetTriggerEvent'                   => 'extension/ez_network/classes/network/eznettriggerevent.php',
      'eZNetTriggerResult'                  => 'extension/ez_network/classes/network/eznettriggerresult.php',
      'eZNetUtils'                          => 'extension/ez_network/classes/network/eznetutils.php',
      'eZOEInputParser'                     => 'extension/ezoe/ezxmltext/handlers/input/ezoeinputparser.php',
      'eZOETemplateUtils'                   => 'extension/ezoe/autoloads/ezoetemplateutils.php',
      'eZOEXMLInput'                        => 'extension/ezoe/ezxmltext/handlers/input/ezoexmlinput.php',
      'eZOOConverter'                       => 'extension/ezodf/classes/ezooconverter.php',
      'eZOOGenerator'                       => 'extension/ezodf/classes/ezoogenerator.php',
      'eZOOImport'                          => 'extension/ezodf/classes/ezooimport.php',
      'eZOpenofficeUploadHandler'           => 'extension/ezodf/uploadhandlers/ezopenofficeuploadhandler.php',
      'eZPNetPatchCrontroller'              => 'extension/ez_network/scripts/patch.php',
      'eZPNetSummary'                       => 'extension/ez_network/scripts/summary.php',
      'eZPaEx'                              => 'extension/ezmbpaex/classes/ezpaex.php',
      'eZPaExUser'                          => 'extension/ezmbpaex/login_handler/ezpaexuser.php',
      'eZPage'                              => 'extension/ezflow/classes/ezpage.php',
      'eZPageBlock'                         => 'extension/ezflow/classes/ezpageblock.php',
      'eZPageBlockItem'                     => 'extension/ezflow/classes/ezpageblockitem.php',
      'eZPageData'                          => 'extension/ezwebin/autoloads/ezpagedata.php',
      'eZPageType'                          => 'extension/ezflow/datatypes/ezpage/ezpagetype.php',
      'eZPageZone'                          => 'extension/ezflow/classes/ezpagezone.php',
      'eZRESTODFHandler'                    => 'extension/ezodf/classes/ezrestodfhandler.php',
      'eZRed5StreamListOperator'            => 'extension/ezflow/autoloads/ezred5streamlist.php',
      'eZSIBlockHandler'                    => 'extension/ezsi/classes/blockhandlers/ezsiblockhandler.php',
      'eZSIESIBlockHandler'                 => 'extension/ezsi/classes/blockhandlers/esi/ezsiesiblockhandler.php',
      'eZSIFSFileHandler'                   => 'extension/ezsi/classes/filehandlers/fs/ezsifsfilehandler.php',
      'eZSIFTPFileHandler'                  => 'extension/ezsi/classes/filehandlers/ftp/ezsiftpfilehandler.php',
      'eZSIFileHandler'                     => 'extension/ezsi/classes/filehandlers/ezsifilehandler.php',
      'eZSIInfo'                            => 'extension/ezsi/ezinfo.php',
      'eZSISSIBlockHandler'                 => 'extension/ezsi/classes/blockhandlers/ssi/ezsissiblockhandler.php',
      'eZScheduledScript'                   => 'extension/ezscriptmonitor/classes/ezscheduledscript.php',
      'eZScriptMonitorInfo'                 => 'extension/ezscriptmonitor/ezinfo.php',
      'eZSiBlockFunction'                   => 'extension/ezsi/classes/ezsiblockfunction.php',
      'eZSolr'                              => 'extension/ezfind/search/plugins/ezsolr/ezsolr.php',
      'eZSolrBase'                          => 'extension/ezfind/classes/ezsolrbase.php',
      'eZSolrDoc'                           => 'extension/ezfind/classes/ezsolrdoc.php',
      'eZSquidCacheManager'                 => 'extension/ezflow/classes/ezsquidcachemanager.php',
      'eZStarRatingInfo'                    => 'extension/ezstarrating/ezinfo.php',
      'eZTagCloud'                          => 'extension/ezwebin/autoloads/eztagcloud.php',
      'eZUnserialize'                       => 'extension/ezflow/autoloads/ezunserialize.php',
      'eZXNetCertify'                       => 'extension/ez_network/scripts/certify.php',
      'eZXNetExtensionClassificationTools'  => 'extension/ez_network/scripts/certify.php',
      'ez_networkInfo'                      => 'extension/ez_network/ezinfo.php',
      'ezauthorSolrStorage'                 => 'extension/ezfind/classes/solrstorage/ezauthorsolrstorage.php',
      'ezbinaryfileSolrStorage'             => 'extension/ezfind/classes/solrstorage/ezbinaryfilesolrstorage.php',
      'ezbotrvideoType'                     => 'extension/multimedia/datatypes/ezbotrvideo/ezbotrvideotype.php',
      'ezcomAddCommentTool'                 => 'extension/ezcomments/classes/ezcomaddcommenttool.php',
      'ezcomComment'                        => 'extension/ezcomments/classes/ezcomcomment.php',
      'ezcomCommentCommonManager'           => 'extension/ezcomments/classes/ezcomcommentcommonmanager.php',
      'ezcomCommentManager'                 => 'extension/ezcomments/classes/ezcomcommentmanager.php',
      'ezcomCommentsType'                   => 'extension/ezcomments/datatypes/ezcomcomments/ezcomcommentstype.php',
      'ezcomCookieManager'                  => 'extension/ezcomments/classes/ezcomcookiemanager.php',
      'ezcomEditCommentTool'                => 'extension/ezcomments/classes/ezcomeditcommenttool.php',
      'ezcomFormTool'                       => 'extension/ezcomments/classes/ezcomformtool.php',
      'ezcomFunctionCollection'             => 'extension/ezcomments/classes/ezcomfunctioncollection.php',
      'ezcomNotification'                   => 'extension/ezcomments/classes/ezcomnotification.php',
      'ezcomNotificationEmailManager'       => 'extension/ezcomments/classes/ezcomnotificationemailmanager.php',
      'ezcomNotificationManager'            => 'extension/ezcomments/classes/ezcomnotifcationmanager.php',
      'ezcomPermission'                     => 'extension/ezcomments/classes/ezcompermission.php',
      'ezcomPostHelper'                     => 'extension/ezcomments/classes/ezcomposthelper.php',
      'ezcomServerFunctions'                => 'extension/ezcomments/classes/ezcomserverfunctions.php',
      'ezcomSubscriber'                     => 'extension/ezcomments/classes/ezcomsubscriber.php',
      'ezcomSubscription'                   => 'extension/ezcomments/classes/ezcomsubscription.php',
      'ezcomSubscriptionManager'            => 'extension/ezcomments/classes/ezcomsubscriptionmanager.php',
      'ezcomUtility'                        => 'extension/ezcomments/classes/ezcomutility.php',
      'ezcommentsInfo'                      => 'extension/ezcomments/ezinfo.php',
      'ezdatatypeSolrStorage'               => 'extension/ezfind/classes/ezdatatypesolrstorage.php',
      'ezdateSolrStorage'                   => 'extension/ezfind/classes/solrstorage/ezdatesolrstorage.php',
      'ezdatetimeSolrStorage'               => 'extension/ezfind/classes/solrstorage/ezdatetimesolrstorage.php',
      'ezenumSolrStorage'                   => 'extension/ezfind/classes/solrstorage/ezenumsolrstorage.php',
      'ezfBaseException'                    => 'extension/ezfind/classes/exceptions/ezfexception.php',
      'ezfModuleFunctionCollection'         => 'extension/ezfind/classes/ezfmodulefunctioncollection.php',
      'ezfSearchResultInfo'                 => 'extension/ezfind/classes/ezfsearchresultinfo.php',
      'ezfSolrDocumentFieldBase'            => 'extension/ezfind/classes/ezfsolrdocumentfieldbase.php',
      'ezfSolrDocumentFieldDummyExample'    => 'extension/ezfind/classes/ezfsolrdocumentfielddummyexample.php',
      'ezfSolrDocumentFieldGmapLocation'    => 'extension/ezfind/classes/ezfsolrdocumentfieldgmaplocation.php',
      'ezfSolrDocumentFieldName'            => 'extension/ezfind/classes/ezfsolrdocumentfieldname.php',
      'ezfSolrDocumentFieldObjectRelation'  => 'extension/ezfind/classes/ezfsolrdocumentfieldobjectrelation.php',
      'ezfSolrDocumentFieldXML'             => 'extension/ezfind/classes/ezfsolrdocumentfieldxml.php',
      'ezfSolrException'                    => 'extension/ezfind/classes/exceptions/ezfsolrexception.php',
      'ezfSolrStorage'                      => 'extension/ezfind/classes/ezfsolrstorage.php',
      'ezfSolrUtils'                        => 'extension/ezfind/classes/ezfsolrutils.php',
      'ezfUpdateSearchIndexSolr'            => 'extension/ezfind/bin/php/updatesearchindexsolr.php',
      'ezfeZPSolrQueryBuilder'              => 'extension/ezfind/classes/ezfezpsolrquerybuilder.php',
      'ezflowInfo'                          => 'extension/ezflow/ezinfo.php',
      'ezgmlLocationFilter'                 => 'extension/ezgmaplocation/classes/ezgmllocationfilter.php',
      'ezjscAccessTemplateFunctions'        => 'extension/ezjscore/autoloads/ezjscaccesstemplatefunctions.php',
      'ezjscAjaxContent'                    => 'extension/ezjscore/classes/ezjscajaxcontent.php',
      'ezjscEncodingTemplateFunctions'      => 'extension/ezjscore/autoloads/ezjscencodingtemplatefunctions.php',
      'ezjscNgComments'                     => 'extension/ngcomments/classes/ezjscngcomments.php',
      'ezjscPacker'                         => 'extension/ezjscore/classes/ezjscpacker.php',
      'ezjscPackerTemplateFunctions'        => 'extension/ezjscore/autoloads/ezjscpackertemplatefunctions.php',
      'ezjscServerFunctions'                => 'extension/ezjscore/classes/ezjscserverfunctions.php',
      'ezjscServerFunctionsJs'              => 'extension/ezjscore/classes/ezjscserverfunctionsjs.php',
      'ezjscServerFunctionsNode'            => 'extension/ezjscore/classes/ezjscserverfunctionsnode.php',
      'ezjscServerFunctionsPublishingQueue' => 'extension/ezjscore/classes/ezjscserverfunctionspublishingqueue.php',
      'ezjscServerRouter'                   => 'extension/ezjscore/classes/ezjscserverrouter.php',
      'ezjscoreInfo'                        => 'extension/ezjscore/ezinfo.php',
      'ezkeywordSolrStorage'                => 'extension/ezfind/classes/solrstorage/ezkeywordsolrstorage.php',
      'ezlightboxInfo'                      => 'extension/ezlightbox/ezinfo.php',
      'ezmatrixSolrStorage'                 => 'extension/ezfind/classes/solrstorage/ezmatrixsolrstorage.php',
      'ezmbpaexInfo'                        => 'extension/ezmbpaex/ezinfo.php',
      'ezmultioptionSolrStorage'            => 'extension/ezfind/classes/solrstorage/ezmultioptionsolrstorage.php',
      'ezmultiuploadInfo'                   => 'extension/ezmultiupload/ezinfo.php',
      'eznetAgreementException'             => 'extension/ez_network/classes/eznetoauthclientconsumeruser.php',
      'eznetException'                      => 'extension/ez_network/classes/eznetoauthclientconsumeruser.php',
      'eznetInstallException'               => 'extension/ez_network/classes/eznetoauthclientconsumeruser.php',
      'eznetOAuthClientConsumerUser'        => 'extension/ez_network/classes/eznetoauthclientconsumeruser.php',
      'eznetSyncException'                  => 'extension/ez_network/classes/eznetoauthclientconsumeruser.php',
      'eznetWebInstallFakeCLI'              => 'extension/ez_network/modules/network/install.php',
      'ezobjectrelationlistSolrStorage'     => 'extension/ezfind/classes/solrstorage/ezobjectrelationlistsolrstorage.php',
      'ezodfInfo'                           => 'extension/ezodf/ezinfo.php',
      'ezoeInfo'                            => 'extension/ezoe/ezinfo.php',
      'ezoeServerFunctions'                 => 'extension/ezoe/classes/ezoeserverfunctions.php',
      'ezoptionSolrStorage'                 => 'extension/ezfind/classes/solrstorage/ezoptionsolrstorage.php',
      'ezpFileArchive'                      => 'extension/ezfind/classes/archive/filestorage/ezpfilearchive.php',
      'ezpFileArchiveFactory'               => 'extension/ezfind/classes/archive/filestorage/ezpfilearchivefactory.php',
      'ezpFileArchiveFileSystem'            => 'extension/ezfind/classes/archive/filestorage/ezpfilearchivefilesystem.php',
      'ezpRestApiProvider'                  => 'extension/ezprestapiprovider/classes/rest_provider.php',
      'ezpRestApiViewController'            => 'extension/ezprestapiprovider/classes/view_controller.php',
      'ezpRestContentController'            => 'extension/ezprestapiprovider/classes/controllers/content.php',
      'ezpRestContentModel'                 => 'extension/ezprestapiprovider/classes/models/rest_content_model.php',
      'ezpaextype'                          => 'extension/ezmbpaex/datatypes/ezpaex/ezpaextype.php',
      'ezpriceSolrStorage'                  => 'extension/ezfind/classes/solrstorage/ezpricesolrstorage.php',
      'ezproductcategorySolrStorage'        => 'extension/ezfind/classes/solrstorage/ezproductcategorysolrstorage.php',
      'ezrangeoptionSolrStorage'            => 'extension/ezfind/classes/solrstorage/ezrangeoptionsolrstorage.php',
      'ezselectionSolrStorage'              => 'extension/ezfind/classes/solrstorage/ezselectionsolrstorage.php',
      'ezsmartshortInfo'                    => 'extension/smartshort/ezinfo.php',
      'ezsrRatingDataObject'                => 'extension/ezstarrating/classes/ezsrratingdataobject.php',
      'ezsrRatingFilter'                    => 'extension/ezstarrating/classes/ezsrratingfilter.php',
      'ezsrRatingObject'                    => 'extension/ezstarrating/classes/ezsrratingobject.php',
      'ezsrRatingObjectTreeNode'            => 'extension/ezstarrating/classes/ezsrratingobjecttreenode.php',
      'ezsrRatingType'                      => 'extension/ezstarrating/datatypes/ezsrrating/ezsrratingtype.php',
      'ezsrServerFunctions'                 => 'extension/ezstarrating/classes/ezsrserverfunctions.php',
      'ezsrTemplateOperators'               => 'extension/ezstarrating/autoloads/ezsrtemplateoperators.php',
      'ezurlSolrStorage'                    => 'extension/ezfind/classes/solrstorage/ezurlsolrstorage.php',
      'ezuserSolrStorage'                   => 'extension/ezfind/classes/solrstorage/ezusersolrstorage.php',
      'ezwebinInfo'                         => 'extension/ezwebin/ezinfo.php',
      'ezwtInfo'                            => 'extension/ezwt/ezinfo.php',
      'ezwtServerCallFunctions'             => 'extension/ezwt/classes/ezwtservercallfunctions.php',
      'ezxmltextSolrStorage'                => 'extension/ezfind/classes/solrstorage/ezxmltextsolrstorage.php',
      'hfpRamdomFunctionCollection'         => 'extension/hfpfetchrandom/modules/hfpfetchrandom/fetchrandomfunctioncollection.php',
      'hfpfetchrandom'                      => 'extension/hfpfetchrandom/classes/hfpfetchrandom.php',
      'ieZLightboxObjectItem'               => 'extension/ezlightbox/classes/ezlightboxobjectitem.php',
      'lightboxFunctionCollection'          => 'extension/ezlightbox/modules/lightbox/lightboxfunctioncollection.php',
      'lightboxOperationCollection'         => 'extension/ezlightbox/modules/lightbox/lightboxoperationcollection.php',
      'ngConnect'                           => 'extension/ngconnect/classes/ngconnect.php',
      'ngConnectAuthFacebook'               => 'extension/ngconnect/classes/ngconnectauthfacebook.php',
      'ngConnectAuthTumblr'                 => 'extension/ngconnect/classes/ngconnectauthtumblr.php',
      'ngConnectAuthTwitter'                => 'extension/ngconnect/classes/ngconnectauthtwitter.php',
      'ngConnectFunctionCollection'         => 'extension/ngconnect/modules/ngconnect/ngconnectfunctioncollection.php',
      'ngConnectFunctions'                  => 'extension/ngconnect/classes/ngconnectfunctions.php',
      'ngConnectTemplateFunctions'          => 'extension/ngconnect/autoloads/ngconnecttemplatefunctions.php',
      'ngConnectUserActivation'             => 'extension/ngconnect/classes/ngconnectuseractivation.php',
      'ngcommentsInfo'                      => 'extension/ngcomments/ezinfo.php',
      'ngconnectInfo'                       => 'extension/ngconnect/ezinfo.php',
      'testFetchData'                       => 'extension/ezflow/classes/fetches/testFetchData.php',
    );

?>