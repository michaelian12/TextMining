<?php
	/**
	 * A function to read CSV file and returning an multidimensional array
	 * @param $csvFile is a path to the CSV file
	 */
	function OpenCsv($csvFile) {
		// open file
		$file = fopen($csvFile,'r');

		// create an array from csv file 
		while(! feof($file))
		{
			$array[] = fgetcsv($file);
		}

		// close file
		fclose($file);

		// returning multidimensional array
		return $array;
	}


	/**
	 * A function to tokenize sentences
	 * and store it into a bag of words
	 * @param $sentence is a sentence that wants to be tokenized
	 */
	function Tokenizing($sentece) {
		// using the global variable instead of local
		global $words;

		// tokenizing
		$token = explode(' ', $sentence);

		// store every word into the words array
		foreach ($token as $word) {
			$words[] = $word;
		}
	}

	/**
	 * A function to filtering a word that doesn't have a value
	 * @param $stopwords is a path to the list of stopwords file
	 */
	function Filtering($stopwords) {
		// using the global variable instead of local
		global $words;

		// open stopword file
		$file = file_get_contents($stopwords, FILE_USE_INCLUDE_PATH);

		// put stopword into an array
		$stopwords = explode(',', $file);

		// filtering
		$words = array_diff($words, $stopwords);
	}

	/**
	 * A function to stemming a word into a basic word
	 */
	function Stemming() {
		// using the global variable instead of local
		global $words;

		// include composer autoloader
		require_once __DIR__ . '/vendor/autoload.php';

		// create stemmer
		$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
		$stemmer  = $stemmerFactory->createStemmer();

		// stemming
		foreach ($words as $word) {
			$output[] = $stemmer->stem($word);
		}

		// update the bag of words with the stemmed words
		$words = $output;
	}

	/**
	 * Constant
	 */
	const $csvFile = 'output.csv' // path to the csv file 
	const $stopwords = 'stopwords.txt' // path to the stopwords file

	/**
	 * Variables
	 */
	$words = []; // a bag of words

	/**
	 * Where the main program begins
	 */

	// open csv file and store in an array
	$array = OpenCsv($csvFile);

	// 
	foreach ($array as $line) {
		$line[5] // get only the messages
	}

?>