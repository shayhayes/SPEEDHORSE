{* DO NOT EDIT THIS FILE! Use an override template instead. *}
{def $content=$attribute.content}
{switch match=$content.event_type}
    {case match=11} {* Normal *}
        {if $content.start.is_valid}{$content.start.timestamp|l10n(shortdatetime)}{/if}
        {if $content.end.is_valid} - {$content.end.timestamp|l10n(shortdatetime)}{/if}
    {/case}
    {case match=12} {* Full day *}
        {if $content.start.is_valid}{$content.start.timestamp|l10n(shortdate)}{/if}
        {if $content.end.is_valid} - {$content.end.timestamp|l10n(shortdate)}{/if}
    {/case}
    {case match=15} {* Weekly *}
        {if $content.start.is_valid}Every {$content.start.timestamp|datetime('custom', '%l')} ({$content.start.timestamp|l10n(shortdate)}-{$content.end.timestamp|l10n(shortdate)}){/if}
    {/case}
    {case match=16} {* Monthly *}
        {if $content.start.is_valid}Every {$content.start.timestamp|datetime('custom', '%d')}. a month.{/if}
    {/case}
    {case match=17} {* Yearly *}
        {if $content.start.is_valid}{$content.start.day}.{$content.start.month}.{/if}
    {/case}
{/switch}

{undef $content}
