#!/usr/bin/php
<?php

# Simple PHP Implementation of the haveibeenpwned API
# https://haveibeenpwned.com/API/v3#PwnedPasswords
# Provided as-is


function p0wned($password)
{
	$hash = strtoupper(sha1($password));
	foreach (explode("\n", file_get_contents("https://api.pwnedpasswords.com/range/".substr($hash,0,5))) as $pmatch)
		if (substr($hash,0,5).substr($pmatch,0,strpos($pmatch,":")) == $hash)
			return true;
}


if (p0wned("admin"))
	print "You have been p0wned";
?>
