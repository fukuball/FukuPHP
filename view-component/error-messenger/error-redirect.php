<?php
/**
 * error-redirect.php is the view of error redirect
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /view-component/error-messenger/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  MIT Licence
 * @version  GIT: <0.0.1>
 * @link     http://www.fukuball.com
 */

?>
<script>
    window.location = "<?php echo $error_redirect_url; ?>";
</script>