<?php
/*Template Name: News*/
get_header();
query_posts(array(
'post_type' => 'news'
)); ?>
