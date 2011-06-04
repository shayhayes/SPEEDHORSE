{* DO NOT EDIT THIS FILE! Use an override template instead. *}
{def $user = fetch(user, current_user) $method_name = ''}
{def $is_user_anonymous = $user.contentobject_id|eq(ezini('UserSettings', 'AnonymousUserID'))}
{def $login_methods = ezini('ngconnect', 'LoginMethods', 'ngconnect.ini')}
{def $login_window_type = ezini('ngconnect', 'LoginWindowType', 'ngconnect.ini')|trim}

{if $login_methods|count}
	<span id="ngconnect">
		{foreach $login_methods as $l}
			{if or($is_user_anonymous, and($is_user_anonymous|not, fetch(ngconnect, user_has_connection, hash(user_id, $user.contentobject_id, login_method, $l))|not))}
				{set $method_name = ezini(concat('LoginMethod_', $l), 'MethodName', 'ngconnect.ini')}
				{if $login_window_type|eq('popup')}
					<a href="#" onclick="window.open('{concat('layout/set/ngconnect/ngconnect/login/', $l, '?redirectURI=', cond(and(is_set($module_result.node_id), is_set($module_result.content_info.url_alias)), $module_result.content_info.url_alias, '')|urlencode)|ezurl(no, full)}', '', 'resizable=1,scrollbars=1,width=800,height=420');return false;"><img src={concat('ngconnect/', $l, '.png')|ezimage} alt="{$method_name|wash}" /></a>
				{else}
					<a href={concat('ngconnect/login/', $l, '?redirectURI=', cond(and(is_set($module_result.node_id), is_set($module_result.content_info.url_alias)), $module_result.content_info.url_alias, '')|urlencode)|ezurl}><img src={concat('ngconnect/', $l, '.png')|ezimage} alt="{$method_name|wash}" /></a>
				{/if}
			{/if}
		{/foreach}
	</span>
{/if}

{undef $user $is_user_anonymous $login_methods $login_window_type}