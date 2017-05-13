# SourceFright
Make your sites sourcecode ugly af

# How to install
- Download the repository
- Put the SourceFright.php and the SourceFright.tpl.php in a directory your choice.
- Put the code below in your index.php (a place where nothing is put out already)
```php
<?php
require_once "SourceFright.php";

$sf = \phil\SourceFright\SourceFright::getInstance();
?>
```
Put the next code at the end of every output 
```php
<?php
$sf->end();
?>
```
- ????
- PROFIT!

# Important
Don't put any ```<script>```-tags in the ```<body>``` tag, they won't be executed!
