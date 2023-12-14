<?php

/**
 * This script should print 'Success'. Please keep the function invocations, modify only the function itself!
 */

function isTheLinkValid(string $link)
{
	$unacceptables = array('https:', '.doc', '.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

	foreach ($unacceptables as $unacceptable) {

		if (strpos($link, $unacceptable) !== false || strrpos($link, $unacceptable) !== false) {
			return false;
		}
	}
	return true;
}


echo isTheLinkValid('http://www.bildau.de/hack.pdf') === false
	&& isTheLinkValid('https://bildau.de') === false
	&& isTheLinkValid('http://bildau.de') === true
	&& isTheLinkValid('http://bildau.de/test.txt') === true
	? 'Success!' : 'Failure!';
