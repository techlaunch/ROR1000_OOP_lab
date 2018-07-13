// use the "ternary" operator to check if page param is set
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 0;
// use "ternary" operator to check to see if page is 0
$prev = ($page == 0) ? 0 : $page - 1;
$next = $page + 1;
$linesPerPage = 6;

function displayProducts($page, $linesPerPage, $maxProducts, $products)
{
	$output = '';
	$offset = $page * $linesPerPage;
	for($x = 0; $x < $linesPerPage; $x++) {
		$key = $x + $offset;
		if ($key > $maxProducts - 1) {
			break;
		}
		$output .= '<li>';
		$output .= '<div class="image">';
		$output .= '<a href="detail.html">';
		$output .= '<img src="images/' 
				 . $products[$x + $offset]['link'] 
				 . '.scale_20.JPG" alt="' 
				 . $products[$x + $offset]['title'] 
				 . '" width="190" height="130"/>';
		$output .= '</a>';
		$output .= '</div>';
		$output .= '<div class="detail">';
		$output .= '<p class="name"><a href="detail.html">' 
				 . $products[$x + $offset]['title'] 
				 . '</a></p>';
		$output .= '<p class="view"><a href="detail.html">purchase</a> | '
				 . '<a href="detail.html">view details >></a></p>';
		$output .= '</div>';
		$output .= '</li>';
	}
	return $output;
}
