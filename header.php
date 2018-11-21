<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta name="keywords" content="custom,software,consultant,workflow,automation,process,problem,solve,solver,solution,website,web,design,wordpress,branding,logo,atlanta,woodstock,canton,calhoun,dalton,kennesaw,marietta,resaca,northwest,georgia,jason,ray,jr,web,design,designs,christian,freelance,contract,christ" />
<?php
    $title = wp_title(' | ', false, 'right') . ' | Web Design, Marketing & Workflow Automation, Greater Atlanta';
    if (get_bloginfo('name')) {
        $title = wp_title(' | ', false, 'right') . get_bloginfo('name') . ' | Web Design, Marketing & Workflow Automation, Greater Atlanta';
    }
?>
<?php
    $desc = 'It’s my goal to help you serve more clients more effectively. I want to ensure that everything your business does or says reflects and enforces the reason for which it was created.';
    $img = 'http://www.jasonray.me/wp-content/uploads/2018/10/idea_opt.jpg';

    if (is_single()) {
        //if single post then add excerpt as meta description
        $desc = str_replace('"', '&quote;', strip_tags(wp_kses_post( wp_trim_words( $post->post_content, 55 ) ) ) );
    } else if(is_category()) {
        //if category page, use category description as meta description
        $desc = strip_tags(category_description(get_category_by_slug(strtolower(get_the_category()))->term_id));
    }
?>

<?php if (is_singular()) : ?>
<?php $hero_img = get_field( 'hero_image', $post->ID ); ?>
<?php
    if(has_post_thumbnail( $post->ID )) {
        //if the post has a featured image, use it
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        $img = esc_attr( $thumbnail_src[0] );
    } else if($hero_img) {
        //if the post has a hero image, use it
        $thumbnail_src = wp_get_attachment_image_src( $hero_img, 'medium' );
        $img = esc_attr( $thumbnail_src[0] );
    }
?>
<?php endif; ?>

<meta name="description" content="<?php echo $desc; ?>" />

<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $title; ?>" />
<meta property="og:description"   content="<?php echo $desc; ?>" />
<meta property="og:image"         content="<?php echo $img; ?>"/>

<meta name="theme-color" content="#29abe2" />
<meta name="google-site-verification" content="7iGWbvC8InfGb_HD_vBw6-eQiUCAOuAkU1oSm3NY_Y4" />

<title><?php echo $title; ?> </title>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<?php wp_head(); ?>
 
</head>


<body id="<?php echo get_post_field( 'post_name', get_post() ); ?>-section" <?php if(!$hero_img): ?>class="no-hero"<?php endif; ?>>
  
    <header>
                                           
        <?php wp_nav_menu('menu_id=nav'); ?> 
         
    </header>

    <?php if(is_singular() && $hero_img): ?>
        <?php $img_meta = wp_get_attachment_metadata( $hero_img ); ?>
        <div class="hero-image parallax-window" data-parallax="scroll" data-natural-width="<?php echo $img_meta['width']; ?>" data-natural-height="<?php echo $img_meta['height']; ?>" data-image-src="<?php echo content_url( 'uploads/' . $img_meta['file'] ); ?>">
        <?php if(get_field( 'hero_title', $post->ID )): ?>
                <h1><?php echo get_field( 'hero_title', $post->ID ); ?></h1>
            <?php endif; ?>
            <?php if(get_field( 'hero_subtitle', $post->ID )): ?>
                <h2><?php echo get_field( 'hero_subtitle', $post->ID ); ?></h2>
            <?php endif; ?>
            <?php if(get_field( 'hero_button_text', $post->ID ) && get_field( 'hero_button_url', $post->ID )): ?>
                <a href="<?php echo get_field( 'hero_button_url', $post->ID ); ?>"><?php echo get_field( 'hero_button_text', $post->ID ); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>