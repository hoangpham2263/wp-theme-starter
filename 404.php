<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta
		charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php get_header(); ?>

	<?php
	$slug = basename($_SERVER['REQUEST_URI']);
	?>

	<?php if ($slug == 'e-commerce') { ?>
		<main class="bg-gray-600">
			<section class="flex justify-center items-center text-white min-h-screen">
				E-commerce
			</section>
		</main>
	<?php } else { ?>
		<main class="bg-gray-600">
			<section class="flex justify-center items-center text-white min-h-screen">
				Not Found
				</div>
			</section>
		</main>
	<?php } ?>

	<?php get_footer(); ?>
</body>

</html>