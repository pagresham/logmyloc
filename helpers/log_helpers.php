<?PHP

/**
 * Check is user is logged in... Whether $_SESSION['user_name'] is set
 * @return boolean 
 */
function isLoggedIn() {
	if(isset($_SESSION['user_name'])) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Default top nav
 * @param  [type] $title [description]
 * @return [type]        [description]
 */
function logmyloc_header($title){
	print "<div data-role='header'>";
	print "<h1>".$title."</h1>";
	// print "<div data-role='navbar'>
	// 	      	<ul>";
	// print "<li><a href='#home-page'>Home</a></li>
	// 		        <li><a class='large-text' href='#add-page'>&#43;</a></li>
	// 		        <li><a class='large-text' href='#sub-page'>&#8722;</a></li>
	// 		        <li><a class='large-text' href='#mul-page'>&#120;</a></li>
	// 		        <li><a class='large-text' href='#div-page'>&#247;</a></li>";

	// print "</ul></div>"; // End navbar
	print "</div>"; // End data-role="header"
} 

?>