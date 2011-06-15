<?php /* #?ini charset="utf-8"?

[MenuSettings]
AvailableMenuArray[]
AvailableMenuArray[]=TopOnly
AvailableMenuArray[]=LeftOnly
AvailableMenuArray[]=DoubleTop
AvailableMenuArray[]=LeftTop
HideLeftMenuClasses[]
HideLeftMenuClasses[]=frontpage
HideLeftMenuClasses[]=blog
HideLeftMenuClasses[]=blog_post
HideLeftMenuClasses[]=frontpage
HideLeftMenuClasses[]=blog
HideLeftMenuClasses[]=blog_post
AlwaysAvailable=false

[SelectedMenu]
CurrentMenu=LeftTop
TopMenu=flat_top
LeftMenu=flat_left

[TopOnly]
TitleText=Only top menu
MenuThumbnail=menu/top_only.jpg
TopMenu=flat_top
LeftMenu=

[LeftOnly]
TitleText=Left menu
MenuThumbnail=menu/left_only.jpg
TopMenu=
LeftMenu=flat_left

[DoubleTop]
TitleText=Double top menu
MenuThumbnail=menu/double_top.jpg
TopMenu=double_top
LeftMenu=

[LeftTop]
TitleText=Left and top
MenuThumbnail=menu/left_top.jpg
TopMenu=flat_top
LeftMenu=flat_left

[MenuContentSettings]
TopIdentifierList[]
TopIdentifierList[]=folder
TopIdentifierList[]=feedback_form
#TopIdentifierList[]=contact_form
TopIdentifierList[]=folder
TopIdentifierList[]=feedback_form
TopIdentifierList[]=gallery
TopIdentifierList[]=forum
TopIdentifierList[]=documentation_page
TopIdentifierList[]=forums
TopIdentifierList[]=event_calendar
TopIdentifierList[]=multicalendar
TopIdentifierList[]=link
TopIdentifierList[]=blog
TopIdentifierList[]=frontpage
TopIdentifierList[]=folder
TopIdentifierList[]=feedback_form
TopIdentifierList[]=gallery
TopIdentifierList[]=forum
TopIdentifierList[]=documentation_page
TopIdentifierList[]=forums
TopIdentifierList[]=event_calendar
TopIdentifierList[]=multicalendar
TopIdentifierList[]=link
TopIdentifierList[]=blog
TopIdentifierList[]=frontpage
LeftIdentifierList[]
LeftIdentifierList[]=folder
LeftIdentifierList[]=feedback_form
#LeftIdentifierList[]=contact_form
LeftIdentifierList[]=folder
LeftIdentifierList[]=feedback_form
LeftIdentifierList[]=gallery
LeftIdentifierList[]=forum
LeftIdentifierList[]=documentation_page
LeftIdentifierList[]=forums
LeftIdentifierList[]=event_calendar
LeftIdentifierList[]=multicalendar
LeftIdentifierList[]=link
LeftIdentifierList[]=blog
LeftIdentifierList[]=frontpage
LeftIdentifierList[]=folder
LeftIdentifierList[]=feedback_form
LeftIdentifierList[]=gallery
LeftIdentifierList[]=forum
LeftIdentifierList[]=documentation_page
LeftIdentifierList[]=forums
LeftIdentifierList[]=event_calendar
LeftIdentifierList[]=multicalendar
LeftIdentifierList[]=link
LeftIdentifierList[]=blog
LeftIdentifierList[]=frontpage
ExtraIdentifierList[]
ExtraIdentifierList[]=infobox
ExtraIdentifierList[]=infobox
ExtraMenuSubitemsCheck=disabled

[NavigationPart]
Part[]
Part[ezcontentnavigationpart]=Content structure
Part[ezmedianavigationpart]=Media library
Part[ezusernavigationpart]=User accounts
Part[ezshopnavigationpart]=Webshop
Part[ezvisualnavigationpart]=Design
Part[ezsetupnavigationpart]=Setup
Part[ezmynavigationpart]=My account
Part[eznetworknavigationpart]=Service portal

[TopAdminMenu]
Tabs[]
Tabs[]=dashboard
Tabs[]=content
Tabs[]=media
Tabs[]=users
Tabs[]=setup
Tabs[]=newsletter

[Topmenu_content]
URL[]
URL[default]=content/view/full/2
URL[browse]=content/browse/2
NavigationPartIdentifier=ezcontentnavigationpart
Enabled[]
Enabled[default]=true
Enabled[browse]=true
Enabled[edit]=false
Shown[]
Shown[default]=true
Shown[navigation]=true
Shown[browse]=true
PolicyList[]
PolicyList[]=2

[Topmenu_media]
NavigationPartIdentifier=ezmedianavigationpart
URL[]
URL[default]=content/view/full/43
URL[browse]=content/browse/43
Enabled[]
Enabled[default]=true
Enabled[browse]=true
Enabled[edit]=false
Shown[]
Shown[default]=true
Shown[navigation]=true
Shown[browse]=true
PolicyList[]
PolicyList[]=43

[Topmenu_users]
NavigationPartIdentifier=ezusernavigationpart
URL[]
URL[default]=content/view/full/5
URL[browse]=content/browse/5
Enabled[]
Enabled[default]=true
Enabled[browse]=true
Enabled[edit]=false
Shown[]
Shown[default]=true
Shown[navigation]=true
Shown[browse]=true
PolicyList[]
PolicyList[]=5

[Topmenu_shop]
NavigationPartIdentifier=ezshopnavigationpart
URL[]
URL[default]=shop/orderlist
Enabled[]
Enabled[default]=true
Enabled[browse]=false
Enabled[edit]=false
Shown[]
Shown[navigation]=true
Shown[default]=false
Shown[browse]=true
PolicyList[]
PolicyList[]=shop/administrate

[Topmenu_design]
NavigationPartIdentifier=ezvisualnavigationpart
URL[]
URL[default]=visual/toolbarlist
Enabled[]
Enabled[default]=true
Enabled[browse]=false
Enabled[edit]=false
Shown[]
Shown[navigation]=true
Shown[default]=true
Shown[browse]=true

[Topmenu_setup]
NavigationPartIdentifier=ezsetupnavigationpart
URL[]
URL[default]=setup/cache
Enabled[]
Enabled[default]=true
Enabled[browse]=false
Enabled[edit]=false
Shown[]
Shown[default]=true
Shown[navigation]=true
Shown[browse]=true
PolicyList[]
PolicyList[]=setup/managecache

[Topmenu_dashboard]
NavigationPartIdentifier=ezmynavigationpart
URL[]
URL[default]=content/dashboard
Enabled[]
Enabled[default]=true
Enabled[browse]=false
Enabled[edit]=false
Shown[]
Shown[default]=true
Shown[navigation]=true
Shown[browse]=true

[Leftmenu_design]
Name=design
Links[]
Links[look_and_feel]=content/edit/54
Links[toolbar_management]=visual/toolbarlist
LinkNames[]
PolicyList_look_and_feel[]
PolicyList_look_and_feel[]=56
PolicyList_toolbar_management[]
PolicyList_toolbar_management[]=visual/toolbarlist

[Leftmenu_my]
Name=dashboard
Links[]
Links[change_password]=user/password
Links[collaboration]=collaboration/view/summary
Links[dashboard]=content/dashboard
Links[edit_profile]=user/edit/(action)/edit
Links[my_bookmarks]=content/bookmark
Links[my_drafts]=content/draft
Links[my_notifications]=notification/settings
Links[my_pending]=content/pendinglist
LinkNames[]
PolicyList_change_password[]
PolicyList_change_password[]=user/password
PolicyList_collaboration[]
PolicyList_collaboration[]=collaboration/view
PolicyList_edit_profile[]
PolicyList_edit_profile[]=user/selfedit
PolicyList_my_bookmarks[]
PolicyList_my_bookmarks[]=content/bookmark
PolicyList_my_drafts[]
PolicyList_my_drafts[]=content/edit
PolicyList_my_notifications[]
PolicyList_my_notifications[]=notification/use
PolicyList_my_pending[]
PolicyList_my_pending[]=content/pendinglist

[Leftmenu_setup]
Name=setup
Links[]
Links[cache]=setup/cache
Links[classes]=class/grouplist
Links[collected]=infocollector/overview
Links[extensions]=setup/extensions
Links[ini]=settings/view
Links[languages]=content/translations
Links[menu_management]=visual/menuconfig
Links[pdf_export]=pdf/list
Links[packages]=package/list
Links[rad]=setup/rad
Links[rss]=rss/list
Links[search_statistics]=search/stats
Links[sections]=section/list
Links[sessions]=setup/session
Links[states]=state/groups
Links[system_information]=setup/info
Links[upgrade_check]=setup/systemupgrade
Links[triggers]=trigger/list
Links[url_management]=url/list
Links[url_translator]=content/urltranslator
Links[url_wildcards]=content/urlwildcards
Links[workflows]=workflow/grouplist
Links[workflow_processes]=workflow/processlist
LinkNames[]
PolicyList_cache[]
PolicyList_cache[]=setup/managecache
PolicyList_classes[]
PolicyList_classes[]=class/grouplist
PolicyList_collected[]
PolicyList_collected[]=infocollector/read
PolicyList_extensions[]
PolicyList_extensions[]=setup/setup
PolicyList_ini[]
PolicyList_ini[]=settings/view
PolicyList_languages[]
PolicyList_languages[]=content/translations
PolicyList_menu_management[]
PolicyList_menu_management[]=visual/menuconfig
PolicyList_pdf_export[]
PolicyList_pdf_export[]=pdf/edit
PolicyList_packages[]
PolicyList_packages[]=package/list
PolicyList_rad[]
PolicyList_rad[]=setup/setup
PolicyList_rss[]
PolicyList_rss[]=rss/edit
PolicyList_search_statistics[]
PolicyList_search_statistics[]=search/stats
PolicyList_sessions[]
PolicyList_sessions[]=setup/administrate
PolicyList_states[]
PolicyList_states[]=state/administrate
PolicyList_system_information[]
PolicyList_system_information[]=setup/system_info
PolicyList_upgrade_check[]
PolicyList_upgrade_check[]=setup/setup
PolicyList_triggers[]
PolicyList_triggers[]=trigger/list
PolicyList_url_management[]
PolicyList_url_management[]=url/list
PolicyList_url_translator[]
PolicyList_url_translator[]=content/urltranslator
PolicyList_url_wildcards[]
PolicyList_url_wildcards[]=content/urltranslator
PolicyList_workflows[]
PolicyList_workflows[]=workflow/grouplist
PolicyList_workflow_processes[]
PolicyList_workflow_processes[]=workflow/processlist

[Leftmenu_shop]
Name=shop
Links[]
Links[customers]=shop/customerlist
Links[discounts]=shop/discountgroup
Links[orders]=shop/orderlist
Links[archive]=shop/archivelist
Links[order_status]=shop/status
Links[product_statistics]=shop/statistics
Links[vat_types]=shop/vattype
Links[vat_rules]=shop/vatrules
Links[product_categories]=shop/productcategories
Links[currencies]=shop/currencylist
Links[preferred_currency]=shop/preferredcurrency
Links[products_overview]=shop/productsoverview
LinkNames[]

[Leftmenu_user]
Name=access_controll
PolicyList[]
PolicyList[]=role/list
Links[]
Links[roles_and_policies]=role/list
LinkNames[]

[LeftMenuSettings]
MenuWidth[]
MenuWidth[small]=13
MenuWidth[medium]=19
MenuWidth[large]=25

[Topmenu_network]
NavigationPartIdentifier=eznetworknavigationpart
Name=Service portal
Tooltip=Overview of your Enterprise subscription
URL[]
URL[default]=network/service_portal
Enabled[]
Enabled[default]=true
Enabled[browse]=false
Enabled[edit]=false
Shown[]
Shown[default]=true
Shown[navigation]=true
Shown[browse]=true
PolicyList[]
PolicyList[]=network/service_portal
PolicyList[]=network/service_portal

[Leftmenu_network]
Name=network
Links[]
Links[service_portal]=network/service_portal
LinkNames[]
*/ ?>