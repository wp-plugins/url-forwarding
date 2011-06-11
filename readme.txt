=== Plugin Name ===
Contributors: OllyBenson
Link: http://www.code.co.uk
Tags: url forwarding, redirecting, legacy pages, campaign, url
Tested up to: 3.1.1
Stable tag: trunk 

Redirect/forward urls to a particular page or post within Wordpress (eg a legacy URL)

== Description ==


The plugin redirects legacy URLs a previous version of a websites that has since been converted into a Wordpress site. It can also be used for other redirecting, eg having a short URL that directs to a page as part of a campaign.

For example:

http://www.example.com/old-page.html

Can be directed to:

http://www.example.com/2011/04/25/new-page.html

Simply by adding 'old-page.html' as a custom field when editing new-page within Wordpress.

Every time a 404 page is called, the Legacy URL plugin checks the database and if it find a legacy-url value that exactly matches the URL it will redirect to the new page.

Please note that this plugin has no settings/options pages within the Wordpress admin module.

== Installation ==

1. Install and enable the plugin,
1. Add a custom field in the post or page with the name *legacy-url* and the value as the URL excluding the domain name. So if the old page is *http://www.example.com/this-is-an-old-page.html*, the value of the custom field should be *this-is-an-old-page.html*.

Please note, there is no longer a requirement to manually amend the 404 page. If you have done so, you should remove the *doUrlForwarding();* line from the 404 page.


== Things to note ==

* The plugin converts the url it checks to lowercase, so you should enter the meta value as lowercase.
* The URL is exactly as stated.  Eg if you have query strings that can variable you would need to treat each one seperately.
* There is no reason why you can't have multiple legacy-url meta values associated with a single page. If you have the same meta value associated with multiple pages, the programme will call the first one it finds.
* This is a simple solution, and possibly quite inefficient. It uses header redirects so will effectively process one page and then load another.
* Because it redirects, search engines will not store the campaign/legacy URL but the page it is redirected to. The more sensible ones (eg Google) will note the redirected page and update their internal databases.
* You can change the name of the custom field that the plugin searches by amending the function itself.

== Changelog ==

= 1.2 =
* Makes use of Wordpress's built-in redirect functionality.
* Uses a hook to add the plugin to the 404 page, so no longer a requirement to amend the 404 page manually.
* No longer makes distinct queries to check for posts and pages, instead searches for 'any' page type.