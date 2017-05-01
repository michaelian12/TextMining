<?php
	$words = ['Perekonomian','Indonesia','sedang','dalam','pertumbuhan','yang','membanggakan'];

	require_once __DIR__ . '/vendor/autoload.php';

	// create stemmer
	$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
	$stemmer  = $stemmerFactory->createStemmer();

	// stemming
	foreach ($words as $word) {
		$output[] = $stemmer->stem($word);
	}

	print_r($output);
?>