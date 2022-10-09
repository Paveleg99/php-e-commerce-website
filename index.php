<?php
ob_start();
// include header.php file
include('Partial Templates/_dbconnect.php');
include('Partial Templates/_header.php');

?>

<?php

/*  include banner area  */
include('Partial Templates/_banner-area.php');
/*  include banner area  */

/*  include topSale section */
include('Partial Templates/_top-sale.php');
/*  include top sale section */

/*  include special price section  */
include('Partial Templates/_special-price.php');
/*  include special price section  */

/*  include banner ads  */
//include('Template/_banner-ads.php');
/*  include banner ads  */

/*  include blog area  */
include('Partial Templates/_blogs.php');
/*  include blog area  */


/*  include newPhones section  */
include('Partial Templates/_new-phones.php');
/*  include newPhones section  */


?>


<?php
// include footer.php file
include('footer.php');
?>