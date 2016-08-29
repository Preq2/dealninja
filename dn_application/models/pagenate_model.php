<?php
class Pagenate_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	function pagenate_me($tbl_name,$total_pages,$limit,$page,$targetpage,$start) {
		
	
		// How many adjacent pages should be shown on each side?
		$adjacents = 3;
		
		//$page = $start;
		
		/* Setup page vars for display. */
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		
		$current_rec = $start + 1;
		
		if ($page < $lastpage) {
			$last_rec = $page * $limit;
		} else {
			$last_rec = $total_pages;
		}
		
		/* 
			Now we apply our rules and draw the pagination object. 
			We're actually saving the code to a variable in case we want to draw it more than once.
		*/


		$pagination = "";
		
		if($lastpage > 1)
		{	
		
			$pagination .= "<div class=\"pagination_text\">$total_pages records found . Displaying $current_rec - $last_rec</div>";
		
	
			$pagination .= "<div class=\"pagination\">";
			//previous button
			if ($page > 1) 
				$pagination.= "<a href=\"$targetpage$prev\">< previous</a>";
			else
				$pagination.= "<span class=\"disabled\">< previous</span>";	
			
			//pages	
			if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage$counter\">$counter</a>";					
				}
			}
			elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
			{
				//close to beginning; only hide later pages
				if($page < 1 + ($adjacents * 2))		
				{
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage$lastpage\">$lastpage</a>";		
				}
				//in middle; hide some front and some back
				elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
				{
					$pagination.= "<a href=\"$targetpage1\">1</a>";
					$pagination.= "<a href=\"$targetpage2\">2</a>";
					$pagination.= "...";
					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage$counter\">$counter</a>";					
					}
					$pagination.= "...";
					$pagination.= "<a href=\"$targetpage$lpm1\">$lpm1</a>";
					$pagination.= "<a href=\"$targetpage$lastpage\">$lastpage</a>";		
				}
				//close to end; only hide early pages
				else
				{
					$pagination.= "<a href=\"$targetpage1\">1</a>";
					$pagination.= "<a href=\"$targetpage2\">2</a>";
					$pagination.= "...";
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage$counter\">$counter</a>";					
					}
				}
			}
			
			//next button
			if ($page < $counter - 1) 
				$pagination.= "<a href=\"$targetpage$next\">next ></a>";
			else
				$pagination.= "<span class=\"disabled\">next ></span>";
			$pagination.= "</div>\n";		
		}
		
		return $pagination;
		
	}		

	public function get_limit()
	{
		
		$limit = 25;
		
		return $limit;
	}

	public function get_offset()
	{
		
		$offset = 0;
		
		return $offset;
	}
	
}

?>