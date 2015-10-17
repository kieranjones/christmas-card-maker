<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Christmas Card Maker</title>
<meta name="description" content="Make your own Christmas Card and share it with your Facebook friends and family." />
<meta name="keywords" content="Christmas Card Maker" />
<meta name="apple-mobile-web-app-capable" content="yes" /> 
<meta name="apple-mobile-web-app-status-bar-style" content="grey" /> 
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> 
<link rel="shortcut icon" href="" /> 
<link rel="bookmark icon" href="" /> 
<link href="/css/main.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php

	$userIdUnique = mt_rand();

	$selectedImage = $_POST['selectedImage'];
	$cardTitle = $_POST['title'];
	$cardMessage = $_POST['message'];
	$cardSignature = $_POST['signature'];
	$titleSize = $_POST['selectTitle'];
	$messageSize = $_POST['selectMessage'];
	$signatureSize = $_POST['selectSignature'];
	$titleColor = $_POST['colorTitle'];
	$messageColor = $_POST['colorMessage'];
	$signatureColor = $_POST['colorSignature'];
	$titleFont = $_POST['selectTitleFont'];
	$messageFont = $_POST['selectMessageFont'];
	$signatureFont = $_POST['selectSignatureFont'];

	//add hash to text color strings
	$titleColor = '#' . $titleColor;
	$messageColor = '#' . $messageColor;
	$signatureColor = '#' . $signatureColor;

	# URL's from the web
	$board = "http://kieranjones.com/christmas-card-maker/images/cards/" . $selectedImage . ".png";

	# read files
	$board_blob = file_get_contents($board);

	# create new image objects
	$b = new imagick();

	# read blobs
	$b->readImageBlob($board_blob);

	/* Draw Title */
	$draw1 = new ImagickDraw();
	/* Black text */
	$draw1->setFillColor($titleColor);

	/* Font properties */
	$draw1->setFont($titleFont);
	$draw1->setFontSize( $titleSize );
	$draw1->setFontWeight( 400 );

	// change wordwrap depending on font size
	switch ($titleSize) {
		case 20:
	         $titleWordwrap = 24;
	         break;
		case 22:
			$titleWordwrap = 23;
			break;
		case 24:
			$titleWordwrap = 21;
			break;
		case 26:
			$titleWordwrap = 19;
			break;
		case 28:
			$titleWordwrap = 17;
			break;
		case 30:
			$titleWordwrap = 16;
			break;
	}

	$fixedCardTitle = wordwrap($cardTitle, $titleWordwrap, "\n");
	$b->annotateImage($draw1, 340, 50, 0, $fixedCardTitle);

	/* Draw Message */
	$draw2 = new ImagickDraw();
	/* Text Color */
	$draw2->setFillColor($messageColor);

	/* Font properties */
	$draw2->setFont($messageFont);
	$draw2->setFontSize( $messageSize );
	$draw2->setFontWeight( 400 );

	// change wordwrap depending on font size
	switch ($messageSize) {
		case 20:
	         $messageWordwrap = 24;
	         break;
		case 22:
			$messageWordwrap = 23;
			break;
		case 24:
			$messageWordwrap = 21;
			break;
		case 26:
			$messageWordwrap = 19;
			break;
		case 28:
			$messageWordwrap = 17;
			break;
		case 30:
			$messageWordwrap = 16;
			break;
	}

	$fixedCardMessage = wordwrap($cardMessage, $messageWordwrap, "\n");
	$b->annotateImage($draw2, 340, 150, 0, $fixedCardMessage);

	/* Draw Message */
	$draw3 = new ImagickDraw();
	/* Text Color */
	$draw3->setFillColor($signatureColor);

	/* Font properties */
	$draw3->setFont($signatureFont);
	$draw3->setFontSize( $signatureSize );
	$draw3->setFontWeight( 400 );

	// change wordwrap depending on font size
	switch ($signatureSize) {
		case 20:
	         $signatureWordwrap = 24;
	         break;
		case 22:
			$signatureWordwrap = 23;
			break;
		case 24:
			$signatureWordwrap = 21;
			break;
		case 26:
			$signatureWordwrap = 19;
			break;
		case 28:
			$signatureWordwrap = 17;
			break;
		case 30:
			$signatureWordwrap = 16;
			break;
	}
	$fixedCardSignature = wordwrap($cardSignature, $signatureWordwrap, "\n");
	$b->annotateImage($draw3, 340, 300, 0, $fixedCardSignature);


	$imgName = "images/usercards/test-image.png";
	$b->writeImage($imgName);

	header("Location: http://kieranjones.com/christmas-card-maker/viewcard.php");
 
?>
</body>
</html>