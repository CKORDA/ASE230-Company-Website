//function for json

<?php
	function convertJson(){
		$file = 'json.json';
		$content = file_get_contents($file);
		$php_array = json_decode($content,true);
		foreach($php_array as $person){
			echo $person['firstname'].' '.$person['lastname'].'<br />';
		} 
		print_r($php_array);
	}
/*$file='beatles.json';
// Read the entire file as a string
$content=file_get_contents($file);
var_dump($content);
echo '<hr />';
// Decode the JSON string into a PHP array
$php_array=json_decode($content,true);
var_dump($php_array);
echo '<hr />';
foreach($php_array as $person){
	echo $person['firstname'].' '.$person['lastname'].'<br />';
}
echo '<hr />';
$php_array[]=[
	'firstname'=>'new',
	'lastname'=>'element'
];
echo '<pre>';
print_r($php_array);
// Encode the PHP array into a JSON string
$string=json_encode($php_array);
echo '<hr />';
echo $string;
file_put_contents('beatles_new.json',$string);
*/
