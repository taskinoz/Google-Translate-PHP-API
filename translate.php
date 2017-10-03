<?php

// Check if text is set before completing the query
if (isset($_GET['t'])){
  //Get text from url
  $text = $_GET['t'];

  //Array Of Languages (Not all included in the array but its only used for a random language)
  //languages and language codes can be found here
  //https://translate.google.com/intl/en/about/languages/
  $languages = array('az','id','ms','bs','ca','ceb','ny','cy','cs','co','da','de','yo','et','en','es','eu','fil','jv','tk','fr','fy','ga',
                      'gl','gd','ha','hr','ht','sn','ig','zu','is','it','sw','ku','lv','haw','lt','hu','mg','mt','nl','no','pl','ro','sq',
                      'sk','sl','so','st','su','fi','sv','mi','vi','tr','xh','el','be','bg','kk','ky','mk','mn','ru','sr','tg','uk','uz',
                      'ka','hy','iw','yi','ur','ar','ps','fa','sd','am','ne','mr','hi','bn','pa','gu','ta','te','kn','ml','si','th','lo',
                      'my','km','ko','ja');

  //Add %20 which is space so the url fetches correctly
  $text = str_ireplace(" ","%20",$text);

  //Language to translate from
  //If undefined it will be set to auto
  if (isset($_GET['fl'])){
    $fromlang = $_GET['fl'];
  }
  else{
    $fromlang = "auto";
  }

  //Language to translate to
  //If undefined it will be set random language
  if (isset($_GET['tl'])){
    $tolang = $_GET['tl'];
  }
  else{
    $tolang = $languages[rand(0,count($languages)-1)];
  }

  //Example URL
  //https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=fn&dt=t&q=hello world
  $lookup = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=".$fromlang."&tl=".$tolang."&dt=t&q=".$text;

  //Data returned from the url
  //Looks like JSON but doesn't behave that way
  $unparsed_json = file_get_contents($lookup);

  //Remove [ ]
  $lang = str_replace("]","", $unparsed_json);
  $lang = str_replace("[","", $lang);

  //Remove the first "
  $lang[0] = "";

  //Get string to the left of the first "
  $lang = strstr($lang, '"', true);

  //Echo the translation
  echo $lang;
}

else {
  echo 'Please enter text to translate using the ?t=text parameter.';
}

?>
