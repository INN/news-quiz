# News Quiz

A wordpress plugin wrapper for [Mother Jones' News Quiz] (https://github.com/motherjones/newsquiz) library.

## Usage

Basic Usage: Use the following shortcode where you'd like a quiz to be placed:

	[quiz key="0AvfAWkLLRik_dGtjRVNUamJwbE1wRWxtVVRURG1UU0E" align="alignright"]

Replace the key and alignment attributes with your own.

See [Mother Jones' documentation](https://github.com/motherjones/newsquiz/blob/master/README.md) for instructions on how to set up the quiz.

## Attributes

- **key:** *(required)* A link to a publicly published google doc from which to pull the quiz content from.
- **title:** *(optional. default: blank)* Give your quiz a title.
- **lede:** *(optional. default: blank)* A subhead for the quiz.
- **align:** *(optional. default: alignnone)* Align the quiz with `alignleft`,`alignright` or `alignnone`.
- **layout:** *(optional. default: sidebar)* The values either `fullwidth` or `sidebar`.
- **answerstyle:** *(optional. default: bullet)* Choose between `alpha`,`bullets`,`roman`, or `numbers`.
- **byline:** *(optional. default: blank)* Give an author byline at the bottom.
- **source:** *(optional. default: blank)* Attribute a datasource.

## Styling

The base plugin comes with a very limited stylesheet, to make it easier to apply custom styles.

The DOM inherits a framework for future interactables, with a header, headline, lede and footer:

	aside.news-quiz
		header.news-quiz-header
			h3.news-quiz-headline
			p.news-quiz-lede
		div.news-quiz-content
			<!-- Mother Jones DOM -->
		footer.news-quiz-footer
			div.news-quiz-byline
			div.news-quiz-source

Where possible, use these classes to apply styles, ensuring future Largo interactive embeds have a similar look and feel.

## Built by and credits

Built by [Will Haynes](https://github.com/willhaynes) on top of [Mother Jones' news quiz library](https://github.com/motherjones/newsquiz).
