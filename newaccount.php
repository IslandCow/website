<?php
//
// "$Id: newaccount.php 351 2012-07-20 05:58:28Z msweet $"
//
// New account form...
//


//
// Include necessary headers...
//

include_once "phplib/site.php";

$usererror = "";

if (html_form_validate())
{
  if (array_key_exists("name", $_POST))
    $name = trim($_POST["name"]);
  else
    $name = "";

  if (array_key_exists("email", $_POST))
    $email = trim($_POST["email"]);
  else
    $email = "";

  if (array_key_exists("email2", $_POST))
    $email2 = trim($_POST["email2"]);
  else
    $email2 = "";

  if ($name == "" || $email == "" || $email2 == "")
    $usererror = "Please provide all of the requested information.";
  else if (!validate_email($email))
    $usererror = "Bad email address.";
  else if ($email != $email2)
    $usererror = "Email addresses do not match.";
  else
  {
    // Good new account request so far; see if account already exists...
    $demail = db_escape($email);
    $result = db_query("SELECT * FROM user WHERE email LIKE '$demail'");
    if (db_count($result) == 0)
    {
      // Nope, add unpublished user account and send registration email.
      db_free($result);

      $user = new user();
      $user->name = $name;
      $user->email = $email;
      $user->password();

      if ($user->save())
      {
	$register = substr(hash("sha256", "$user->id:$user->modify_date:$user->hash"), 0, 8);

	$url = "https://$_SERVER[SERVER_NAME]$html_path/enable.php?email=" .
	       urlencode($email) . "&register=$register";
	$msg = wordwrap("Thank you for requesting an account on the "
		       ."$SITE_NAME web site.  To complete your "
		       ."registration, go to the following URL:\n\n"
		       ."    $url\n\n"
		       ."and provide a password for your account.\n");
	mail($email, "$SITE_NAME User Registration", $msg,
	     "From: $SITE_EMAIL\r\n");

	html_header("New Account");
	html_title("msweet.org", "New Account");

	print("<p>Thank you for requesting an account. You should receive an "
	     ."email from $SITE_EMAIL shortly with instructions on "
	     ."completing your registration.</p>\n");

	html_footer();
	exit();
      }
      else
        $usererror = "Unable to create account. Please contact $SITE_EMAIL "
                    ."for assistance.";
    }
    else
    {
      // Account or email already exists...
      $row = db_next($result);

      $usererror = "Email address already in use for an account.";
    }

    db_free($result);
  }
}
else
{
  $name   = "";
  $email  = "";
  $email2 = "";

  if ($REQUEST_METHOD == "POST")
    $usererror = "Bad form submission.";
}

// New user...
html_header("New Account");
html_title("msweet.org", "New Account");

if ($usererror != "")
  html_show_error($usererror);

print("<p>Please fill in the form below to register. An email will be sent "
     ."to the address you supply to confirm the registration:</p>\n");
html_form_start($PHP_SELF);
html_form_field_start("name", "Real Name");
html_form_text("name", "John Doe", $name);
html_form_field_end();
html_form_field_start("email", "EMail");
html_form_email("email", "name@example.com", $email);
html_form_field_end();
html_form_field_start("email2", "EMail Again");
html_form_email("email2", "name@example.com", $email);
html_form_field_end();
html_form_end(array("SUBMIT" => "+Request Account"));

html_footer();

//
// End of "$Id: newaccount.php 351 2012-07-20 05:58:28Z msweet $".
//
?>
