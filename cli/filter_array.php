<?php

/**
 * The expected output is "apple, banana, cherry, tomato"
 * Please modify only the function itself, nothing else
 */

function filterArray($validOptions, $input)
{
	$inputsCount = count($input);

	for ($i = 0; $i < $inputsCount; $i++) {
		if (!in_array($input[$i], $validOptions)) {
			unset($input[$i]);
		}
	}
	echo implode(', ', $input);
}

$input = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validOptions = ['apple', 'pear', 'banana', 'cherry', 'tomato'];


filterArray($validOptions, $input);
