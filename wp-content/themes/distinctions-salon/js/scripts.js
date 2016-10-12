jQuery(function($) {

	// Adds a new user meta menu to log into admin or log out
	$('#top.logged-in #header_meta').html('<div class="container"><div class="phone-info"><span><a href="/wp-admin/profile.php">My Account</a><a href="/wp-login.php?action=logout">Log Out</a></span></div></div>');
});