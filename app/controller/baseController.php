<?php
class baseController
{
    //Function to load the menu
    public function loadNav()
    {
        include('app/view/modules/nav.php');
    }

    //Function to load the head
    public function loadHead()
    {
        include('app/view/modules/head.php');
    }
}
