<?php


// get title for current page
function getTitle() {

    global $pageTitle;

    if (isset($pageTitle)) {

        echo $pageTitle;

    } else {

        echo 'Default';

    }
}