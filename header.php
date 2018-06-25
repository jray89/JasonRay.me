<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta name="keywords" content="website,design,wordpress,branding,logo,calhoun,dalton,kennesaw,marietta,resaca,northwest,georgia,jason,ray,jr,web,designs,christian,freelance,contract,christ" />
<meta name="description" content="Hi, I'm Jason. I’m a senior front end software developer based out of Northwest Georgia. There are several things that I’m very passionate about. These are a few: Loading a website that’s so quick you wonder if something’s broken (don’t worry, it’s not); Resizing a browser window as a website transitions seamlessly from desktop to tablet to phone; Watching a website creep to the top of the search results as organic traffic and SEO optimization converge." />
<meta name="google-site-verification" content="7iGWbvC8InfGb_HD_vBw6-eQiUCAOuAkU1oSm3NY_Y4" />

<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<?php wp_head(); ?>
 
</head>

<?php $hero_img = get_field( 'hero_image' ); ?>

  
<body id="<?php echo get_post_field( 'post_name', get_post() ); ?>-section" <?php if(!$hero_img): ?>class="no-hero"<?php endif; ?>>
 
<div id="wrapper">
 
    <header>
                                           
        <?php wp_nav_menu('menu_id=nav'); ?> 
         
    </header>

    <?php if($hero_img): ?>
        <?php $img_meta = wp_get_attachment_metadata( $hero_img ); ?>
        <div class="hero-image parallax-window" data-parallax="scroll" data-natural-width="<?php echo $img_meta['width']; ?>" data-natural-height="<?php echo $img_meta['height']; ?>" data-image-src="<?php echo content_url( 'uploads/' . $img_meta['file'] ); ?>">
        <?php if(get_field('hero_title')): ?>
                <h1><?php echo get_field('hero_title'); ?></h1>
            <?php endif; ?>
            <?php if(get_field('hero_subtitle')): ?>
                <h2><?php echo get_field('hero_subtitle'); ?></h2>
            <?php endif; ?>
            <?php if(get_field('hero_button_text') && get_field('hero_button_url')): ?>
                <a href="<?php echo get_field('hero_button_url'); ?>"><?php echo get_field('hero_button_text'); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>