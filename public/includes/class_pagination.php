<?php
/**
 *
 * @ MLM PRO
 *
 * @ Version  : 4.6
 * @ Author   : JJ
 * @ Release on : 2013-11-12
 * @ Website  : http://website.mlmpro
 *
 **/

class Pagination {
	function Pagination($table_name, $conditional = null) {
		$this->tbl = $table_name;
		$this->cond = ($conditional != "" ? "WHERE " . $conditional : "");
		$this->page = 1;
		$this->max_results = 25;
		$this->total_pages = 1;
		$this->results = $this->getResults();
		$this->allowed = array();
		$this->extraq = "";
	}

	function setOrders($orderby, $sortby) {
		$this->orderby = $orderby;
		$this->sortby = $sortby;

		if ($this->sortby == "ASC") {
			$this->nextsortby = "DESC";
			return null;
		}

		$this->nextsortby = "ASC";
	}

	function setMultiOrder($orderby, $sortby) {
		$this->extraq = (", " . $orderby . " ") . $sortby;
	}

	function getResults() {
		global $db;

		$count = $db->fetchOne(("SELECT COUNT(*) AS NUM FROM " . $this->tbl . " ") . $this->cond);
		return $count;
	}

	function setMaxResult($result) {
		$this->max_results = $result;
	}

	function setPage($page) {
		$this->total_pages = ceil($this->results / $this->max_results);
		$page = ((!is_numeric($page) || $this->total_pages < $page) ? 1 : $page);
		$this->page = $page;
	}

	function getFrom() {
		$from = $this->max_results * $this->page - $this->max_results;
		return $from;
	}

	function allowedfield($vars = null) {
		if ($vars !== null) {
			if (is_array($vars)) {
				foreach ($vars as $v) {
					$this->allowed[] = $v;
				}
			}
		}

	}

	function setNewOrders($orderby = null, $sortby = null) {
		if ($orderby !== null) {
			if (count($this->allowed) == 0) {
				$this->orderby = $orderby;
			}
			else {
				if (in_array($orderby, $this->allowed)) {
					$this->orderby = $orderby;
				}
			}
		}


		if ($sortby !== null) {
			if ($sortby != $this->sortby) {
				$this->oldsortby = $this->sortby;
				$this->sortby = $this->nextsortby;
				$this->nextsortby = $this->oldsortby;
			}
		}

	}

	function getQuery() {
		global $db;

		$q = $db->query(((("SELECT * FROM " . $this->tbl . " ") . $this->cond . " ORDER BY " . $this->orderby . " ") . $this->sortby . " ") . $this->extraq . " LIMIT " . $this->getFrom() . ", " . $this->max_results);
		return $q;
	}

	function setLink($link) {
		$this->url = $link;
	}

	function linkorder($orderby, $name, $classes) {
		$url = "orderby=" . $orderby . "&sortby=" . $this->nextsortby . "&p=" . $this->page;

		$path = "<a class='".$classes."' href=\"" . $this->url . $url . "\">" . $name . "</a>";
		return $path;
	}

	function totalResults() {
		return $this->results;
	}

	function totalPages() {
		return $this->total_pages;
	}

	function getPage() {
		return $this->page;
	}

	function prevpage() {
		$url = $this->url . "orderby=" . $this->orderby . "&sortby=" . $this->sortby . "&p=" . ($this->page - 1);
		return $url;
	}

	function nextpage() {
		$url = $this->url . "orderby=" . $this->orderby . "&sortby=" . $this->sortby . "&p=" . ($this->page + 1);
		return $url;
	}

	function gotopage($page = null) {
		if ($page === null) {
			$page = $this->page;
		}

		$url = $this->url . "orderby=" . $this->orderby . "&sortby=" . $this->sortby . "&p=" . $page;
		return $url;
	}

	function getPagination($prev, $next) {
		$html = "<ul>";

		if (1 < $this->page) {
			if (3 < $this->page) {
				$html .= "<li class=\"pgbtn\"><a href=\"" . $this->gotopage(1) . "\">&laquo;</a></li>";
			}


			if (1 < $this->page) {
				$html .= "<li class=\"pgbtn\"><a href=\"" . $this->gotopage($this->page - 1) . "\">" . $prev . "</a></li>";
			}


			if (2 < $this->page) {
				$i = $this->page - 2;

				while ($i <= $this->page - 1) {
					$html .= "<li><a href=\"" . $this->gotopage($i) . "\">" . $i . "</a></li>";
					++$i;
				}
			}
			else {
				$html .= "<li><a href=\"" . $this->gotopage(1) . "\">1</a></li>";
			}
		}

		$html .= "<li class=\"current\">" . $this->page . "</li>";

		if (1 < $this->total_pages - $this->page) {
			if (1 < $this->total_pages - $this->page) {
				$i = $this->page + 1;

				while ($i <= $this->page + 2) {
					$html .= "<li><a href=\"" . $this->gotopage($i) . "\">" . $i . "</a></li>";
					++$i;
				}
			}
		}
		else {
			if ($this->total_pages != $this->page) {
				$html .= "<li><a href=\"" . $this->gotopage($this->total_pages) . "\">" . $this->total_pages . "</a></li>";
			}
		}


		if ($this->total_pages != $this->page) {
			$html .= "<li class=\"pgbtn\"><a href=\"" . $this->gotopage($this->page + 1) . "\">" . $next . "</a></li>";
		}


		if (3 <= $this->total_pages - $this->page) {
			$html .= "<li class=\"pgbtn\"><a href=\"" . $this->gotopage($this->total_pages) . "\">&raquo;</a></li>";
		}

		$html .= "</ul>";
		return $html;
	}
}

?>