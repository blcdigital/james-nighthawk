<!DOCTYPE html>
<!--[if lt IE 8]><html class="ie lt-ie8 lt-ie9"> <![endif]-->
<!--[if IE 8]>   <html class="ie ie8 lt-ie9"> <![endif]-->
<!--[if IE 9]>   <html class="ie ie9"> <![endif]-->
<!--[if !IE]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        var
            docLocation = document.location.href
        ;

        // if there is a # in the url
        if (docLocation.match(/\/#\//)) {
            // remove and redirect
            document.location.href = docLocation.replace('/#/', '/');
        }

        // set js enabled class - replaces 'no-js' with 'js'
        document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1' + 'js' + '$2');
    </script>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo wp_make_link_relative( get_template_directory_uri() ); ?>/images/favicon.ico"/>

    <!--[if gte IE 9]><!-->
        <link href="<?php echo wp_make_link_relative( get_template_directory_uri() ); ?>/style.css" media="screen" rel="stylesheet" />
    <!--<![endif]-->
    <!--[if lt IE 9]>
        <link href="<?php echo wp_make_link_relative( get_template_directory_uri() ); ?>/ie.css" media="screen" rel="stylesheet" />

        <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
