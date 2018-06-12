## Initials
- Theme Name: AGP | Workshops
- Theme URI: [Auroville Green Practices](http://agpworkshops.com)
- Author: Kshitij Bhatt
- Author URI: http://www.github.com/kshitijbhatt
-  GitHub Theme URI: kshitijbhatt/AGP | Workshops
- Description: A custom WordPress theme build on top of Understrap 0.8.2 by Holger Koenemann
- Version: 0.8.2
- License: AGP | Workshops WordPress Theme based on Understrap by Holger Koenemann, 
          > Copyright 2013-2017 Holger Koenemann
          AGP | Workshops is distributed under the terms of the GNU GPL version 2
- License URI: http://www.gnu.org/licenses/gpl-2.0.html
- Text Domain: AGP | Workshops
- Tags: one-column, custom-menu, featured-images, theme-options, translation-ready

- This theme, like WordPress, is licensed under the GPL.
- AGP | Workshops is based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc.

## Resource Licenses:
- [Font Awesome:](http://fontawesome.io/license) (Font: SIL OFL 1.1, CSS: MIT License)
- [Bootstrap](http://getbootstrap.com) & [License](https://github.com/twbs/bootstrap/blob/master/LICENSE) | Code licensed under MIT, documentation under CC BY 3.0.
- [Owl Carousel 2](http://www.owlcarousel.owlgraphic.com/) & [License]( https://github.com/smashingboxes/OwlCarousel2/blob/develop/LICENSE) | Code licensed under MIT
and of course
- [jQuery](https://jquery.org) | Code licensed under MIT
- [WP Bootstrap Navwalker by Edward McIntyre](https://github.com/twittem/wp-bootstrap-navwalker) | GNU GPL
- [Understrap Website](http://understrap.com) | (http://understrap.com)

- [Child Theme Project](https://github.com/holger1411/understrap-child)

## License
UnderStrap WordPress Theme, Copyright 2013-2017 Holger Koenemann
UnderStrap is distributed under the terms of the GNU GPL version 2

http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html

## Changelog
            > We will be updating changelog every monday for the team to work on together

## Basic Features

- Combines Underscore’s PHP/JS files and Bootstrap’s HTML/CSS/JS.
- Comes with Bootstrap (v4) Sass source files and additional .scss files. Nicely sorted and ready to add your own variables and customize the Bootstrap variables.
- Uses a single and minified CSS file for all the basic stuff.
- [Font Awesome](http://fortawesome.github.io/Font-Awesome/) integration (v4.6.3)
- Comes with extra slider script by [Owl Carousel](http://www.owlcarousel.owlgraphic.com/) (v2.1.4)
- Jetpack ready.
- WooCommerce support.
- [Child Theme](https://github.com/holger1411/understrap-child) ready.
- Translation ready.

## Starter Theme + HTML Framework = WordPress Theme Framework

The _s theme is a good starting point to develop a WordPress theme. But it is “just” a raw starter theme. That means it outputs all the WordPress stuff correctly but without any layout or design.
Why not add a well known and supported layout framework to have a solid, clean and responsive foundation? That’s where Bootstrap comes in.

## Confused by All the CSS and Sass Files?

Some basics about the Sass and CSS files that come with UnderStrap:
- The theme itself uses the `/style.css`file just to identify the theme inside of WordPress. The file is not loaded by the theme and does not include any styles.
- The `/css/theme.css` and it´s minified little brother `/css/theme.min.css` file(s) provides all styles. It is composed of five different SCSS sets and one variable file at `/sass/theme.scss`:

                  - 1 "theme/theme_variables";  // <--------- Add your variables into this file. Also add variables to overwrite Bootstrap or UnderStrap variables here
                  - 2 "../src/bootstrap-sass/assets/stylesheets/bootstrap";  // <--------- All the Bootstrap stuff - Don´t edit this!
                  - 3 "understrap/understrap"; // <--------- Some basic WordPress stylings and needed styles to combine Boostrap and Underscores
                  - 4 "../src/fontawesome/scss/font-awesome"; // <--------- Font Awesome Icon styles

                  // Any additional imported files //
                  - 5 "theme/theme";  // <--------- Add your styles into this file

- Don’t edit the files no. 2-4 files/filesets or you won’t be able to update it without overwriting your own work!
- Your design goes into: `/sass/theme`. Add your styles to the `/sass/theme/_theme.scss` file and your variables to the `/sass/theme/_theme_variables.scss`. Or add other .scss files into it and `@import` it into `/sass/theme/_theme.scss`.

## Installation

- Download the understrap folder from GitHub or from understrap.com
- IMPORTANT: If you download it from GitHub make sure you rename the "understrap-master.zip" file just to "understrap.zip" or you might have problems using child themes !!
- Upload it into your WordPress installation subfolder here: `/wp-content/themes/`
- Login to your WordPress backend
- Go to Appearance → Themes
- Activate the UnderStrap theme

## Developing With npm, Gulp and SASS and [Browser Sync][1]

### Installing Dependencies
- Make sure you have installed Node.js and Browser-Sync* (* optional, if you wanna use it) on your computer globally
- Then open your terminal and browse to the location of your UnderStrap copy
- Run: `$ npm install` and then: `$ gulp copy-assets`

### Running
To work and compile your Sass files on the fly start:

- `$ gulp watch`

Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpfile.js` in the beginning of the file:
```javascript
var browserSyncOptions = {
    proxy: "localhost/theme_test/", // <----- CHANGE HERE
    notify: false
};
```
- then run: `$ gulp watch-bs`

## How to Use the Build-In Widget Slider

The front-page slider is widget driven. Simply add more than one widget to widget position “Hero”.
- Click on Appearance → Widgets.
- Add two, or more, widgets of any kind to widget area “Hero”.
- That’s it.

[1] Visit [http://browsersync.io](http://browsersync.io) for more information on Browser Sync

Licenses & Credits
=
- Font Awesome: http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
- Bootstrap: http://getbootstrap.com | https://github.com/twbs/bootstrap/blob/master/LICENSE (Code licensed under MIT documentation under CC BY 3.0.)
- Owl Carousel 2: http://www.owlcarousel.owlgraphic.com/ | https://github.com/smashingboxes/OwlCarousel2/blob/develop/LICENSE (Code licensed under MIT)
and of course
- jQuery: https://jquery.org | (Code licensed under MIT)
- WP Bootstrap Navwalker by Edward McIntyre: https://github.com/twittem/wp-bootstrap-navwalker | GNU GPL
