# HitsPage (MODX Revolution)
=========
** Pageviews for MODX Revolution**

----------------------------------------

[Homepage](http://hitspage.artdevue.com)

Donwload [MODX extras](http://modx.com/extras/package/hitspage)

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

*   **IMPORTANT!** To activate the plugin in this resource, you need to insert the template output tape challenge Snippets [[HPCount]]. I did it, so that no plug for lack Pars each resource.

### Authors
<table>
  <tr>
    <td><img src="http://www.gravatar.com/avatar/39ef1c740deff70b054c1d9ae8f86d02?s=60"></td><td valign="middle">Valentin Rasulov<br>artdevue.com<br><a href="http://artdevue.com">http://artdevue.com</a></td>
  </tr>
</table>