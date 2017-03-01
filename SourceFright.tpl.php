<?php

return "<body></body><script>document.getElementsByTagName('body')[0].innerHTML = String.fromCharCode(".implode(",", $indexes).");</script>";
