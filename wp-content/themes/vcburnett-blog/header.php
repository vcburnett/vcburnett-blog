<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox-style.css">

<!-- Scripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/fancybox/fancybox-js.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

		// Fancybox
		$(".fancybox").attr("rel","gallery").fancybox({
			padding : 0,
			maxWidth : 1280,
			openEffect : 'elastic',
			closeEffect : 'elastic',
		    helpers : {
		        overlay : {
		            css : {
		                'background' : 'rgba(0, 36, 36, 0.92)'
		            }
		        },
		        title : {
		        	type : 'float'
		        }
		    }
		});

		// Variable declarations ----------
		// IDs and Classes
		var browserWindow = $(window);

		var navMob = $(".nav-mob");
		var menuMob = $("#mob-menu");

		var header = $("header");
		var footer = $("footer");

		var wrapper = $("#page");
		var content = $("#the-content");
		var foodStats = $("#article-food-stats");
		var contentFood = $("#article-food");
		var cookTime = $("#cook-time-wrap");
		var cookLevel = $("#cook-level-wrap");

		var logoName = $("#logo-name");

		var csThumb = $(".cs-thumb");

		var post1 = $(".vcb-post:first-child");
		var post1text = $(".vcb-post:first-child .vcb-post-text");
		var articleTitle = $("#title");
		var articleImage = $(".content-header-image");
		var aboutImage = $(".content-about-image");
		var innerImage = $(".inner-header-image");
		var relatedImage = $(".vcb-rel-art-img");

		var aboutTitle = $("#title-about");
		var aboutContent = $("#the-content-about");

		var innerSpacing = $("#inner-spacing");
		var contactSpacing = $("#contact-top-spacing");

		var form = $("form");
		var inputWidths = $(".input-width");
		var formH1 = $("#contact-form h1");
		var contactWrap = $("#contact-wrap");
		var contactSocialP = $("#contact-social p");
		var contactSocialA = $("#contact-social a");

		var windowWidth, windowHeight, wrapHeight, menuToggle, percent1, percent2, percent3, post1height, post1textPercentage, csThumbWidth, articleImageHeight, innerImageHeight, articleTitlePadding, foodStatsWidth, contentFoodWidth, aboutImageHeight, aboutTitlePadding;

		// Declaring values
			// Static values
			// Percents
			if (windowWidth > 640) {
				percent1 = .9;
			} else {
				percent1 = .95;
			}
			percent2 = .75;
			percent3 = .4;
			percent4 = .25;

			menuToggle = "closed";

			// Dynamic values
			function elementsUpdate() {
				windowHeight = browserWindow.height() - footer.outerHeight(true); // Compensating for footer height
				windowWidth = browserWindow.width();

				wrapHeight = wrapper.height();

				if (browserWindow.width() <= 640) {
					post1height = browserWindow.height() * percent1;
				} else {
					post1height = browserWindow.height() * percent2;
				}

				// First post height
				post1.height(post1height);
				post1textPercentage = post1height/2.75;
				post1text.css("padding-top" , post1textPercentage);

				// Articles
				// Header image - Articles
				articleImageHeight = browserWindow.height() * percent1;
				articleImage.height(articleImageHeight);
				// Header image - Inner pages
				innerImageHeight = browserWindow.height() * percent3;
				innerImage.height(innerImageHeight);
				// Inner spacing
				innerSpacing.css("height" , innerImageHeight * (percent3 * 1.5));
				contactSpacing.css("height" , innerImageHeight * (percent4 * 1.5));
				// Article title
				articleTitlePadding = browserWindow.height() * .35;
				articleTitle.css({
					"padding-top" : 1.2 * articleTitlePadding,
					"padding-bottom" : .3 * articleTitlePadding
				});

				// Article foods
				foodStatsWidth = foodStats.outerWidth(true);
				contentFoodWidth = content.width() - (foodStatsWidth + 5);
				if (windowWidth > 640) {
					contentFood.css("width" , contentFoodWidth);
					cookLevel.css("height" , "auto");
				} else {
					contentFood.css("width" , "100%");
					cookLevel.css("height" , cookTime.height() + 2);
				}

				// Related Images
				relatedImage.css("height" , relatedImage.width() + "px");

				// Cool Shit thumbs
				csThumbWidth = csThumb.width();
				csThumb.css("height" , csThumbWidth);

				// Contact Me
				if (windowWidth > 640) {
					inputWidths.css("width" , form.width()-20);
				} else {
					inputWidths.width(contactWrap.width()-20);
				}
				contactSocialP.css("margin-top" , formH1.outerHeight(true));
				contactSocialA.css("height" , contactSocialA.width());

				//About Me
				aboutTitlePadding = browserWindow.height() * .35;
				aboutTitle.css({
					"padding-top" : 1.68 * aboutTitlePadding,
					"padding-bottom" : .3 * aboutTitlePadding
				});
				aboutImageHeight = browserWindow.height() * percent2;
				aboutImage.height(aboutImageHeight);
				aboutContent.css("margin-top" , aboutImageHeight - aboutTitle.outerHeight(true));
			}



		// Start functions ----------
		elementsUpdate();
		footerSticky();

		// Declared functions ----------
		// Footer
		function footerSticky() {
			if (wrapHeight < windowHeight) {
				footer.addClass("sticky-bottom");
			} else {
				footer.removeClass("sticky-bottom");
			}
		}


		// Events ----------
		// ON CLICK
		menuMob.on("click", function() {
			if (menuToggle == "closed") {
				menuToggle = "open";
				navMob.addClass("nav-mob-on");
				menuMob.addClass("mob-menu-on");
			} else {
				menuToggle = "closed";
				navMob.removeClass("nav-mob-on");
				menuMob.removeClass("mob-menu-on");
			}
		});

		// ON SCROLL
		browserWindow.on("scroll", function() {
			var theScroll = browserWindow.scrollTop();
			if (theScroll > 100) {
				header.addClass("header-short");
				navMob.addClass("nav-mob-short");
			} else {
				header.removeClass("header-short");
				navMob.removeClass("nav-mob-short");
			}
			var aiPos = "50% " + theScroll*.45 + "px";
			articleImage.css("background-position", aiPos);
		});

		// ON RESIZE
		browserWindow.on("resize", function() {
			elementsUpdate();
			footerSticky();
		}).trigger("resize");


		// ----------
		// Cool Shit filter function
		// ----------
		var allButtons = $(".cs-filter a");
		var csFilters = [
			"#csf-all",
			"#csf-deisgn",
			"#csf-photography",
			"#csf-music",
			"#csf-food",
			"#csf-videos",
			"#csf-social",
			"#csf-professional",
			"#csf-tutorial",
			"#csf-travel",
			"#csf-lifestyle",
			"#csf-random"
		];
		var csfAll = $("#csf-all");
		var csfDesign = $("#csf-design");
		var csfPhotography = $("#csf-photography");
		var csfMusic = $("#csf-music");
		var csfFood = $("#csf-food");
		var csfVideos = $("#csf-videos");
		var csfSocial = $("#csf-social");
		var csfProfessional = $("#csf-professional");
		var csfTutorial = $("#csf-tutorial");
		var csfTravel = $("#csf-travel");
		var csfLifestyle = $("#csf-lifestyle");
		var csfRandom = $("#csf-random");

		allButtons.on("click", function() {

			// All buttons toggle on/off
			if ($(this).hasClass("filterOn") == true) {
				$(this).removeClass("filterOn");
			} else {
				$(this).addClass("filterOn");
			}

		});

	});

</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header>

		<div id="main-logo">
		<a href="index.php" target="_self">
			<div id="logo-image">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/vcb-logo.png" alt="Victor Burnett">
			</div>
			<div id="logo-name">
				Victor<br>Burnett
			</div>
		</a>
		</div>

		<nav id="mob-menu">
			<a href="javascript:void(0);" id="#btn-mob-menu"><div class="mob-menu-line"></div><div class="mob-menu-line"></div><div class="mob-menu-line"></div></a>
		</nav>

		<nav class="main-menu">
			<a href="index.php" class="menu-btn btn-blog">Blog</a>
			<a href="cool-shit.php" class="menu-btn btn-cool-shit">Cool Shit</a>
			<a href="about-me.php" class="menu-btn btn-about">About Me</a>
			<a href="say-hello.php" class="menu-btn btn-contact">Say Hello</a>
		</nav>

	</header>

	<nav class="nav-mob">
		<a href="index.php" class="menu-btn btn-blog">Blog</a>
		<a href="cool-shit.php" class="menu-btn btn-cool-shit">Cool Shit</a>
		<a href="about-me.php" class="menu-btn btn-about">About Me</a>
		<a href="say-hello.php" class="menu-btn btn-contact">Say Hello</a>
	</nav>

	<!-- end header -->

<div id="page" class="site">
	<div class="site-content-contain">
	
		<div id="content" class="site-content">
