# ht_enqueue_handlebars

WordPress Handlebars management. Sort of like wp_enqueue_scripts, this library is used to print handlebars templates to the footer, while avoiding duplicates.

### Usage
* Add a template

`holotree_enqueue_handlebar( 'comment-template', dirname( __FILE__ ) .'/templates/comment-template.html' );` 

* Remove an already added template

`holotree_deenqueue_handlebar( 'comment_template' );`


### License, Copyright etc.
Copyright 2014 [Josh Pollock](http://JoshPress.net).

Licensed under the terms of the [GNU General Public License version 2](http://www.gnu.org/licenses/gpl-2.0.html) or later. Please share with your neighbor.
