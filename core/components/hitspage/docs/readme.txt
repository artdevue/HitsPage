# HitsPage (MODX Revolution)
=========
** Pageviews for MODX Revolution**

----------------------------------------

[Homepage](http://hitspage.artdevue.com)

Donwload [MODX extras](http://modx.com/extras/package/hitspage)

[GitHub](http://github.com/artdevue/HitsPage) 

## Displays results in resource

### Example snippet call in resources:

```php
[[!HitsPage]]
```

### Example snippet call in resources and write Template Variable (TV) HitsPage:

```php
[[!HitsPage? &saveTv=`true`]]
```

## Output via expansion getPage or getResources

### Fragment insert code in the chunk:

```php
{%hp-[[+id]]%}
```

*   An example of a template for the gallery

```html
<div class="blog_details">
  <div class="yearbl">[[+publishedon:verticalyear]]</div>
  <div class="day">[[+publishedon:strtotime:date=`%d`]]</div>
  <div class="month">[[+publishedon:strtotime:date=`%B`]]</div>
  <div class="comments">{%hp-[[+id]]%} view<i class="icon-eye-open"></i></div>
  <div class="author">[[+createdby:userinfo=`fullname`]]</div>
  <div class="clear"></div>
</div>
```