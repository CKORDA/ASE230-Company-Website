//function for csv
<?php
	function getCsv(){
		$file = 'awards.csv';
		$fp=fopen($file,'r');
		while($content=fgetcsv($fp)){
			echo $content[0],' ',$content[1].'<br >';
		}
		fclose($fp);
	}

/*$file='beatles.csv';

$fp=fopen($file,'a');
fputs($fp,'New,member,11'.PHP_EOL);
fclose($fp);
echo '<hr>';

$fp=fopen($file,'r');
while(!feof($fp)){
	$content=fgets($fp);
	if(strlen($content)<5) continue;
	$person=explode(',',$content);
	echo $person[0],' ',$person[1].'<br >';
}
fclose($fp);
echo '<hr>';

$fp=fopen($file,'r');
while($content=fgetcsv($fp)){
	echo $content[0],' ',$content[1].'<br >';
}
fclose($fp);
*/
