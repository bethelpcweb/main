=== Phoenix Split Tester ===
Contributors: Joshua Ziering
Donate link: http://www.FullSpeedSEO.com
Tags: split, test, wordpress, analytics, AB
Requires at least: 2.9.0
Tested up to: 2.9.2
Stable tag: 1.0

Plugin let you split test pages and posts against each other with different sets of analytics.

== Description ==

This lets you use the content of another published, or unpublished, post or page as the content to split test a page with. It will also include in your footer two different sets of analytics if you'd like so that you can keep track of all the metrics associated with each page.


== Installation ==

1) Unzip and upload to your plugins directory.
2) Activate Plugin
3) Make another Google Analytics Profile for your domain.
4) Plug in the UA numbers to the Wordpress Split Tester options screen under “Settings”
5) Add a meta field to your split test post. Call it “splittestpost” and put in the Post ID of the post you’d like to split test against. It doesn’t matter if it’s a draft. This way, you can have alternate non-published content.

So, from then on it will test both pages at 50%. You can see the results on your Google analytics pages. Your main analytics will continue to fire because it loads two sets of analytics on the split tested paged.

Now you can split test things like bounce rate, time on page, and complete goals. Woo!

Notes: You should disable other analytics plugins and remove any GA Code from your Footer.php file. The plugin will add your regular profile in on NON-Split tested pages.