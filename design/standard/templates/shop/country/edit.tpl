{* DO NOT EDIT THIS FILE! Use an override template instead. *}
{default attribute_base=ContentObjectAttribute}
{let countries=fetch( 'content', 'country_list' )
     class_content=$attribute.class_content}

{def $country = cond( is_set( $#collection_attributes[$attribute.id] ), $#collection_attributes[$attribute.id], $attribute.content.value )}
{default $max_len = 20
    $select_size = 1}
<select name="Country" size="1">
    
{def $alpha_2 = ''}
{foreach $countries as $key => $current_country}
    {set $alpha_2 = $current_country.Alpha2}
    {if $country|ne( '' )}
        {if $country|is_array|not}
            {* Backwards compatability *}
            <option {if $country|eq( $current_country.name )}selected="selected"{/if} value="{$alpha_2}">{$current_country.Name}</option>
        {else}
            <option {if is_set( $country.$alpha_2 )}selected="selected"{/if} value="{$alpha_2}">{$current_country.Name}</option>
        {/if}
    {else}
            <option {if is_set( $class_content.default_countries.$alpha_2 )}selected="selected"{/if} value="{$alpha_2}">{$current_country.Name}</option>
    {/if}
{/foreach}
</select>

{/let}
{/default}
