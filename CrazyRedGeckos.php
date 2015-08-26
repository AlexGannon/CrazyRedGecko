<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

	<link rel="stylesheet" href="CrazyRedGeckos.css" />

	
</head>

<body>

<?php
	$imagesTotal = 9;     // SET TOTAL IMAGES IN GALLERY

	// set description to each image
	$description[1] = 'This is a description for picture number 1 ';
	$description[2] = 'This is a description for picture number 2 ';
	$description[3] = 'This is a description for picture number 3 ';
	$description[4] = 'This is a description for picture number 4 ';
	$description[5] = 'This is a description for picture number 5 ';
	$description[6] = 'This is a description for picture number 6 ';
	$description[7] = 'This is a description for picture number 7 ';
	$description[8] = 'This is a description for picture number 8 ';
	$description[9] = 'This is a description for picture number 9 ';
?>

<div class="galleryContainer">
	<h1 align="center">Crazy Red Geckos Breeders</h1>


	<div class="galleryThumbnailsContainer">
		<div class="galleryThumbnails">
			<?php
				for ($t = 1; $t <= $imagesTotal; $t++) {
					echo '<a href="javascript: changeimage(' . $t . ')" class="thumbnailsimage' . $t . '"><img src="images/thumbs/image' . $t . '.jpg" width="auto" height="100" alt="" /></a>';
				}
			?>
		</div>
	</div>

	<div class="galleryPreviewContainer">
		<div class="galleryPreviewImage">
			<?php
				for ($i = 1; $i <= $imagesTotal; $i++) {
					echo '<img class="previewImage' . $i . '" src="images/image' . $i . '.jpg" width="900" height="auto" alt="" />';
				}
			?>
		</div>

		<div class="galleryPreviewArrows">
			<a href="#" class="previousSlideArrow">&lt;</a>
			<a href="#" class="nextSlideArrow">&gt;</a>
		</div>
	</div>

	<div class="galleryNavigationBullets">
		<?php
			for ($b = 1; $b <= $imagesTotal; $b++) {
				echo '<a href="javascript: changeimage(' . $b . ')" class="galleryBullet' . $b . '"><span>Bullet</span></a> ';
			}
		?>
	</div>

	<div class="galleryDescription">
		<?php
			for ($x = 1; $x <= $imagesTotal; $x++) {
				echo '<div class="description' . $x . '">' . $description[$x] . '</div>';
			}
		?>
	</div>
</div>

<script type="text/javascript">
// init variables
var imagesTotal = <?php echo $imagesTotal; ?>;
var currentImage = 1;
var thumbsTotalWidth = 0;

$('a.galleryBullet' + currentImage).addClass("active");
$('a.thumbnailsimage' + currentImage).addClass("active");
$('div.description' + currentImage).addClass("visible");


// SET WIDTH for THUMBNAILS CONTAINER
$(window).load(function() {
	$('.galleryThumbnails a img').each(function() {
		thumbsTotalWidth += $(this).width() + 10 + 8;
	});
	$('.galleryThumbnails').width(thumbsTotalWidth);
});


// PREVIOUS ARROW CODE
$('a.previousSlideArrow').click(function() {
	$('img.previewImage' + currentImage).hide();
	$('a.galleryBullet' + currentImage).removeClass("active");
	$('a.thumbnailsimage' + currentImage).removeClass("active");
	$('div.description' + currentImage).removeClass("visible");

	currentImage--;

	if (currentImage == 0) {
		currentImage = imagesTotal;
	}

	$('a.galleryBullet' + currentImage).addClass("active");
	$('a.thumbnailsimage' + currentImage).addClass("active");
	$('img.previewImage' + currentImage).show();
	$('div.description' + currentImage).addClass("visible");

	return false;
});
// ===================


// NEXT ARROW CODE
$('a.nextSlideArrow').click(function() {
	$('img.previewImage' + currentImage).hide();
	$('a.galleryBullet' + currentImage).removeClass("active");
	$('a.thumbnailsimage' + currentImage).removeClass("active");
	$('div.description' + currentImage).removeClass("visible");

	currentImage++;

	if (currentImage == imagesTotal + 1) {
		currentImage = 1;
	}

	$('a.galleryBullet' + currentImage).addClass("active");
	$('a.thumbnailsimage' + currentImage).addClass("active");
	$('img.previewImage' + currentImage).show();
	$('div.description' + currentImage).addClass("visible");

	return false;
});
// ===================


// BULLETS CODE
function changeimage(imageNumber) {
	$('img.previewImage' + currentImage).hide();
	currentImage = imageNumber;
	$('img.previewImage' + imageNumber).show();

	$('.galleryNavigationBullets a').removeClass("active");
	$('.galleryThumbnails a').removeClass("active");
	$('.galleryDescription > div').removeClass("visible");

	$('a.galleryBullet' + imageNumber).addClass("active");
	$('a.thumbnailsimage' + currentImage).addClass("active");
	$('div.description' + currentImage).addClass("visible");
}
// ===================


// AUTOMATIC CHANGE SLIDES
function autoChangeSlides() {
	$('img.previewImage' + currentImage).hide();
	$('a.galleryBullet' + currentImage).removeClass("active");
	$('a.thumbnailsimage' + currentImage).removeClass("active");
	$('div.description' + currentImage).removeClass("visible");

	currentImage++;

	if (currentImage == imagesTotal + 1) {
		currentImage = 1;
	}

	$('a.galleryBullet' + currentImage).addClass("active");
	$('a.thumbnailsimage' + currentImage).addClass("active");
	$('img.previewImage' + currentImage).show();
	$('div.description' + currentImage).addClass("visible");
}

var slideTimer = setInterval(function() {autoChangeSlides(); }, 3000);
</script>

</body>
</html>