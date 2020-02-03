<?php

include('constant.php');
include('server.php');

changeImage(150, 150, PHOTO_BIG.$_FILES['photo']['name'][$i], $path, $type);