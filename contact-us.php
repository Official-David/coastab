<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="arrowthemes">
  <title>Coasta Bank PLC | Contact Us</title>

  <!-- fav icon -->
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

  <!-- css -->
  <link rel="stylesheet" href="css/plyr.css">
  <link rel="stylesheet" href="css/default/bootstrap.css">
  <link rel="stylesheet" href="css/default/theme.css">
  <link rel="stylesheet" href="css/custom.css">
</head>

<body id="tm-container">
  <div class="tm-container">

    <!-- preloader -->
    <div class="tm-preload">
      <div class="spinner"></div>
    </div>

    <!-- to top scroller -->
    <div class="uk-sticky-placeholder">
      <div data-uk-smooth-scroll data-uk-sticky="{top:-500}">
        <a class="tm-totop-scroller uk-animation-slide-bottom" href="#" ></a>
      </div>
    </div>

    <!-- header -->
    <div class="tm-header tm-header-right" data-uk-sticky>
      <div class="uk-container uk-container-center">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">

          <!-- logo -->
          <a class="tm-logo uk-hidden-small" href="index.html">
            <img src="images/demo/default/logo/logo.png" width="180" height="50" alt="demo">
          </a>

          <!-- small logo -->
          <a class="tm-logo-small uk-visible-small" href="index.html">
            <img src="images/demo/default/logo/logo-small.png" width="140" height="40" alt="demo">
          </a>

          <!-- main menu -->
          <div class="uk-flex uk-flex-right">
            <div class="uk-hidden-small">
              <nav class="tm-navbar uk-navbar tm-navbar-transparent">
                <div class="uk-container uk-container-center">
                  <ul class="uk-navbar-nav uk-hidden-small">

                    <!-- home menu  -->
                    <li><a href="index.html">Home</a>
                    </li>
                    <!-- elements menu -->
                    <li><a href="about-us.html">About</a>
                    </li>

                    <!-- News menu -->
                    <li  class="uk-parent uk-active" data-uk-dropdown><a href="contact-us.php">Contact Us</a>
                    </li>

                    <!-- Shop menu -->
                    <li><a href="users/login.php">Login</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>

            <!-- offcanvas nav icon-->
            <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>

            <!-- search button -->
            <div class="uk-navbar-content tm-navbar-more uk-visible-large uk-margin-left" data-uk-dropdown="{mode:'click'}">
              <a class="uk-link-reset"></a>
              <div class="uk-dropdown uk-dropdown-flip">
                <form action="#" class="uk-search" data-uk-search="" id="search-page" method="post" name="search-box">
                  <input class="uk-search-field" name="searchword" placeholder="search..." type="text"> <input name="task" type="hidden" value="search">
                  <input name="option" type="hidden" value=""> <input name="Itemid" type="hidden" value="502">
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>



    <!-- spotlight -->
    <div id="tm-spotlight" class="tm-block-spotlight uk-block uk-block-default tm-block-fullwidth tm-grid-collapse" >
      <div class="uk-container uk-container-center">
        <section class="tm-spotlight uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}">
          <div class="uk-width-1-1">
            <div class="uk-panel uk-contrast tm-overlay-primary">
              <div class="tm-background-cover uk-cover-background uk-flex uk-flex-center uk-flex-middle" style="background-position: 50% 0px; background-image:url(images/background/bg-image-1.jpg)" data-uk-parallax="{bg: '-200'}">
                <div class="uk-position-relative uk-container tm-inner-container">
                  <h2 class="uk-module-title-alt uk-margin-remove">Contact us</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- breadcrumbs -->
    <div class="tm-breadcrumbs">
      <div class="uk-container uk-container-center">
        <div class="uk-hidden-small">
          <ul class="uk-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="uk-active"><span>Contact Us</span></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- main content -->
    <div id="tm-main" class="tm-block-main uk-block uk-block-default">
      <div class="uk-container uk-container-center">
        <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>
          <div class="tm-main uk-width-medium-1-2">
            <main id="tm-content" class="tm-content">
              <article class="uk-article tm-article">
                <div class="tm-article-wrapper">
                  <div class="tm-article-content uk-margin-large-bottom uk-margin-top-remove">
                    <div class="tm-article">
                      <!-- contact form -->
                      <div class="contact">
                        <h3 class="uk-panel-title">Contact Us</h3>
                        <form method="post" action="contact-us.php" class="uk-form uk-form-stacked">
                          <div class="uk-grid uk-grid-width-medium-1-1 uk-grid-width-1-1">

                            <div>
                              <div id="alert-msg-contact" class="alert-msg uk-margin-bottom"></div>
                            </div>

                            <!-- name field -->
                            <div class="uk-form-icon uk-grid-margin">
                              <i class="uk-icon-user"></i>
                              <input type="text" class="uk-width-1-1" name="name" placeholder="Name" size="30" required="required">
                            </div>

                            <!-- email field -->
                            <div class="uk-form-icon uk-grid-margin">
                              <i class="uk-icon-envelope"></i>
                              <input type="email" class="uk-width-1-1" name="email" placeholder="Your email" size="30" required="required">
                            </div>

                            <!-- subject field -->
                            <div class="uk-form-icon uk-grid-margin">
                              <i class="uk-icon-bookmark"></i>
                              <input type="text" class="uk-width-1-1 optional" name="subject" placeholder=" Subject" size="60">
                            </div>

                            <!-- message field -->
                            <div class="uk-grid-margin">
                                <textarea class="uk-width-1-1" name="message" cols="30" rows="3" placeholder="Your message" required="required"></textarea>
                            </div>

                            <!-- submit button -->
                            <div class="form-actions">
                              <button class="uk-button uk-button-primary" type="submit" name="send">Send mail</button>
                            </div>

                            <div id="message"></div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </main>
          </div>
          
          <!-- phpmailer -->

<?php

if (isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'getcoastaplc.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@getcoastaplc.com';                     //SMTP username
    $mail->Password   = 'getcoastaplc1234';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('support@getcoastaplc.com', 'Coasta Bank PLC');     //Add a recipient
    $mail->addReplyTo($email, $name);


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}}

?>
    <!-- end phpmailer -->

          <!-- sidebar-a -->
          <aside class="tm-sidebar-a uk-width-medium-1-2">
            <div class="uk-panel uk-panel-box">
              <div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid-margin="">
                <div class="uk-panel uk-panel-space">
                  <h3 class="uk-module-title">Support</h3>
                  <p>Having difficulties using our services?<br>
                  Send us a mail,<br>
                  and we will get back to you</p>
                  <ul class="uk-list list-icons">
                    <li><i class="uk-icon-phone"></i>+1(405)588-8585</li>
                    <li><i class="uk-icon-phone"></i>+44(745)128-7900</li>
                    <li><i class="uk-icon-map-marker"></i> Florida, USA</li>
                  </ul>
                </div>
              </div>
            </div>
          </aside>

        </div>
      </div>
    </div>

    <!-- bottom-d -->
    <div class="tm-block-bottom-c uk-block uk-block-primary" id="tm-bottom-c">
        <div class="uk-container uk-container-center">
          <section class="tm-bottom-c uk-grid" data-uk-grid-margin="" data-uk-grid-match="{target:'> div > .uk-panel'}">
            <div class="uk-width-1-1">
              <div class="uk-panel">
                <div class="uk-grid" data-uk-grid-margin="">
                  <div class="uk-width-medium-1-2">
                    <h3 class="uk-margin-small-top">Sign up for our newsletter to get the latest news</h3>
                  </div>
                  <div class="uk-width-medium-1-2">

                    <!-- subscription form -->
                    <form id="subscribe_form" class="uk-form">
                    <div id="alert-msg-subscribe" class="alert-msg"></div>
                    <div class="uk-grid uk-grid-small" data-uk-grid-margin>

                      <div class="uk-width-medium-2-5">
                        <div><input type="text" placeholder="Your name" name="subscribe-name" class="uk-width-1-1" required="required"></div>
                      </div>

                      <div class="uk-width-medium-2-5">
                        <div><input type="email" placeholder="Email address" name="subscribe-email" class="uk-width-1-1" required="required"></div>
                      </div>

                      <div class="uk-width-medium-1-5">
                        <div class="form-group uk-margin-remove">
                          <button id="subscribe_button" type="submit" class="uk-button uk-button-default">Subscribe</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- bottom-d -->
      <div class="tm-block-bottom-d uk-block uk-block-secondary tm-overlay-6" id="tm-bottom-d">
      <div class="uk-container uk-container-center">
        <section class="tm-bottom-d uk-grid" data-uk-grid-margin="" data-uk-grid-match="{target:'> div > .uk-panel'}">

          <!-- block -->
          <div class="uk-width-1-1 uk-width-medium-1-4">
            <div class="uk-panel">
              <img alt="logo" height="40" src="images/demo/general/logo-small-white.png" width="140">
              <p>Coasta Bank PLC.<br>
              Florida, USA<br>
              <br>
              +1(405)588-8585<br>
              +44(745)128-7900<br>
              hello@getcoastaplc.com<br>
              support@getcoastaplc.com</p>
            </div>
          </div>

          <!-- block -->
          <div class="uk-width-1-1 uk-width-medium-1-4">
            <div class="uk-panel">
              <h3 class="uk-h3 uk-module-title uk-margin-bottom">Disclaimer</h3>
              <p>
                        Terms, conditions and fees for accounts, products, programs and services are subject to change. Not all accounts, products, and services as well as pricing described here are available in all jurisdictions or to all customers.
                        </p>
                    </div>
              </div>


          <!-- block -->
          <div class="uk-width-1-1 uk-width-medium-1-4">
              <div class="uk-panel">
                <h3 class="uk-h3 uk-module-title uk-margin-bottom">Quick links</h3>
                <ul class="uk-list list-icons">
                  <li><i class="uk-icon-angle-right"></i><a href="index.html" target="_self">Home</a></li>
                  <li><i class="uk-icon-angle-right"></i><a href="about-us.html" target="_self">About</a></li>
                  <li><i class="uk-icon-angle-right"></i><a href="contact-us.php" target="_self">Contact us</a></li>
                  <li><i class="uk-icon-angle-right"></i><a href="users/login.php" target="_self">Login</a></li>
                  <div id="google_translate_element">
                  </div>

                    <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                    }
                    </script>
              </div>
            </div>

          <!-- block -->
          <div class="uk-width-1-1 uk-width-medium-1-4">
            <div class="uk-panel">
              <h3 class="uk-h3 uk-module-title uk-margin-bottom">Our Values</h3>
              <p>Do not dwell in the past, dream of the future, concentrate the mind on now.</p>
              <p>Let reality be reality. Let things flow naturally. Do not dwell in the past, dream of the future.</p>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- bottom-e -->
    <div class="tm-block-bottom-e uk-block uk-block-secondary" id="tm-bottom-e">
      <div class="uk-container uk-container-center">
        <section class="tm-bottom-e uk-grid" data-uk-grid-margin="" data-uk-grid-match="{target:'> div > .uk-panel'}">
          <div class="uk-width-1-1 uk-width-medium-1-2">
            <div class="uk-panel">
              <p>Copyright &copy; Coasta Bank PLC</p>
            </div>
          </div>
        </section>
      </div>
    </div>


  <!-- jquery -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="js/jquery/jquery.min.js" type="text/javascript"></script>

  <!-- uikit -->
  <script src="vendor/uikit/js/uikit.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/accordion.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/autocomplete.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/datepicker.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/grid.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/lightbox.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/parallax.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/pagination.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/slider.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/slideset.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/slideshow.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/slideshow-fx.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/sticky.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/timepicker.min.js" type="text/javascript"></script>
  <script src="vendor/uikit/js/components/tooltip.min.js" type="text/javascript"></script>

  <!-- theme -->
  <script src="js/theme.js" type="text/javascript"></script>
  <script src="js/plyr.js" type="text/javascript"></script>
</body>
</html>