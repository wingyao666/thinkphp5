<?php

return [
    'key' => 'wingyao',
    'lat' => time(), //签发时间
    'nbf' => time(), //生效时间
    'exp' => time() + 1 * 3600   //过期时间 1小时过期

];
