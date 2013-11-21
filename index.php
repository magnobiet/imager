<?php

	if (!empty($_GET['size'])) {

		$size = explode('x', $_GET['size']);

		$width  = $size[0];
		$height = $size[1];

	} else {

		$width  = 300;
		$height = 300;

	}

	header('Content-Type: image/png');
	createImage($width, $height);

	function createImage($width, $height) {

		$image             = ImageCreate($width, $height);
		$background_color  = ImageColorAllocate($image, 204, 204, 204);
		$line_color        = imagecolorallocate($image, 153, 153, 153);
		$text_color        = ImageColorAllocate($image, 150, 150, 150);
		$text              = "$width x $height";

		ImageFill($image, 0, 0, $background_color);

		$font_size = ($width > $height) ? ($height / 10) : ($width / 10);

		ImageRectangle($image, 0, 0, $width - 1, $height - 1, $text_color);

		#ImageLine($image, 0, 0, $width - 1, $height - 1, $text_color);
	    #ImageLine($image, 0, $height - 1, $width - 1, 0, $text_color);

		ImageTTFText($image, $font_size, 0, ($width / 2) - ($font_size * 2.75), ($height / 2) + ($font_size * 0.2), $text_color, 'arial.ttf', $text);
		ImagePNG($image);

		ImageDestroy($image);

	}



/* End of file index.php */
/* Location: ./imager/index.php */
