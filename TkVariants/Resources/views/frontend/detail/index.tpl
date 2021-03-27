{extends file="parent:frontend/detail/index.tpl"}

{block name='frontend_index_content'}
{if $tkVariants|@count} 
 {include file="frontend/_includes/product_slider.tpl" articles=$tkVariants productSliderCls="topseller--content panel--body"}
{/if}
  {$smarty.block.parent}
{/block}