<?php
function valid($locale) {
    return in_array($locale, ['ca', 'es']);
}

if (isset($_GET['lang']) && valid($_GET['lang'])) {
    $language = $_GET['lang'].'.utf8';
}else{
    $language = 'es.utf8';
}
putenv("LC_ALL=$language");
putenv("LC_LANG=$language");
setlocale(LC_ALL, $language);

$domain = 'messages';
bindtextdomain($domain, "../locale");
textdomain($domain);
?>
