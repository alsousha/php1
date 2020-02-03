<?php
session_start();
session_destroy();
header("Location: pageUsers.php");