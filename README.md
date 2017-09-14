# Google-Translate-PHP-API
A self hosted API that allows you to pass text through Google Translate.

### Variables:
t = Text to translate
fl = From language (If this is left blank it will default to auto).
tl = To language (If left blank it will translate it into a random language).

### Examples:
To translate text to a desired language pass varialbes to the pages as so:

`example.com/translate.php?t=Hello world&tl=fr`
This example will take "Hello world" and translate it to French.

`example.com/translate.php?t=Hello world`
This example will take "Hello world" and translate it into a random language.

`example.com/translate.php?t=Hallo Wereld&fl=nl&tl=en`
This example will take "Hallo Wereld" and translate it from Dutch to English.

