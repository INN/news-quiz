=== News Quiz Shortcode ===
Contributors: inn_nerds, will_haynes
Donate link: http://inn.org/donate/
Tags: quiz, news, shortcode, 
Requires at least: 4.1
Tested up to: 4.5.2
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin creates a shortcode wrapper for Mother Jones' news quiz library, which uses Google Docs.

== Description ==

This shortcode allows you to embed a news quiz created in accordance with Mother Jones' [news quiz library](https://github.com/motherjones/newsquiz).

== Installation ==

1. In the WordPress Dashboard go to **Plugins**, then click the **Add Plugins** button and search the WordPress Plugins Directory for News Quiz Shortcode. Alternatively, you can download the zip file from this Github repo and upload it manually to your WordPress site.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Create a Google Spreadsheet [following Mother Jones' instructions](https://github.com/motherjones/newsquiz#set-up-a-google-spreadsheet)
4. Place the ID of the Google Spreadsheet in the shortcode: 

```
[quiz key="0AvfAWkLLRik_dGtjRVNUamJwbE1wRWxtVVRURG1UU0E" align="alignright"]
```

== Frequently Asked Questions ==

= What are the shortcode's attributes? =

- **key:** *(required)* A link to a publicly published google doc from which to pull the quiz content from.
- **title:** *(optional. default: blank)* Give your quiz a title.
- **lede:** *(optional. default: blank)* A subhead for the quiz.
- **align:** *(optional. default: alignnone)* Align the quiz with `alignleft`,`alignright` or `alignnone`.
- **layout:** *(optional. default: sidebar)* The values either `fullwidth` or `sidebar`.
- **answerstyle:** *(optional. default: bullet)* Choose between `alpha`,`bullets`,`roman`, or `numbers`.
- **byline:** *(optional. default: blank)* Give an author byline at the bottom.
- **source:** *(optional. default: blank)* Attribute a datasource.

= How do I style the quiz? =

The quiz comes with a very limited default stylesheet. You can style the quiz by editing your theme's stylesheet.

== Screenshots ==

No screenshots at this time.

== Changelog ==

= 0.2 =

- rename CSS classes from `.largo-interactive-` to `.news-quiz-`
- rename PHP function prefix from `largo_interactive_quiz_` to `news_quiz_`

= 0.1 =

- Initial release

== Upgrade Notice ==

= 0.2 =

-f you have created styles scoped to `.largo-interactive`, you will need to change them to `.news-quiz`.

If you have created PHP functionality that depends upon the existence of any of the `largo_interactive_quiz_` prefixed functions or actions, you will need to update those to use the `news_quiz_` prefix.
