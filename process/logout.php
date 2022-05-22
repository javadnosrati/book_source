<?php

require_once '../config/autoload.php';

logout();
setFlash('messages', 'شما با موفقیت خارج شدید.');
redirect('/index.php');

