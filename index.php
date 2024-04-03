<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

// creating parameters for check token
$shopify = new Shopify();
$parameters = $_GET;

//check store

include_once("includes/check_token.php");


// Here display anything about the store

//$access_scopes = $shopify -> rest_api("/admin/oauth/access_scopes.json",array(),"GET");
//$response = json_decode($access_scopes['body'],true);


?>

<?php include_once("header.php"); ?>

  <section>

    <div class="alert">
      <dl>
        <dt>
          <p>Welcome to Shopify App</p>
        </dt>
      </dl>
    </div>
  </section>
  <footer></footer>
</main>

<?php include_once("footer.php"); ?>