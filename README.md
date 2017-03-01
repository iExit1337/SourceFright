# SourceFright
Make your sites sourcecode ugly af

# How to install
1. Download the repository
2. Put the SourceFright.php and the SourceFright.tpl.php in a directory your choice.
3. Put the code below in your index.php (a place where nothing is put out already)
```php
<?php
require_once "SourceFright.php";

$sf = \phil\SourceFright\SourceFright::getInstance();
?>
```
4. Put the next code at the end of every output 
```php
<?php
$sf->end();
?>
```
5. ????
6. PROFIT!

# Important
Don't put any ```<script>```-tags in your the ```<body>``` tags, they won't be executed!
