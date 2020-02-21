<?php
include_once 'database.class.php';

class Common extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	protected function paginateData()
	{
		$per_page     = PER_PAGE;
		$current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$start        = ($current_page - 1) * $per_page;

		$sql = "SELECT * FROM $this->table";
		$sql .= ($this->where != '') ? " WHERE $this->where" : '';
		$sql .= ($this->order != '') ? " ORDER BY $this->order" : '';
		$sql .= " LIMIT $start, $per_page";

		$result = $this->connection->query($sql);

		return $result;
	}

	public function paginationLinks()
	{
		$sql = "SELECT * FROM $this->table";
		$sql .= ($this->where != '') ? " WHERE $this->where" : '';
		$sql .= ($this->order != '') ? " ORDER BY $this->order" : '';
		
		$result       = $this->connection->query($sql);
		$current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
		
		$total_pages = ceil($result->num_rows / PER_PAGE);

		$prev = ($current_page > 1) ? ($current_page - 1) : 1;
		$next = ($current_page < $total_pages) ? ($current_page + 1) : $total_pages;

		$str = '<div class="table-foot">';
		$str .= '<ul class="pagination pagination-sm no-margin pull-right">';

		if ($current_page != 1)
		{
			$str .= '<li><a href="?page=1">&lt;&lt;</a></li>';
			$str .= '<li><a href="?page='.$prev.'">&lt;</a></li>';
		}

		for ($i = 1; $i <= $total_pages; $i++)
		{
			$style = '';

			if ($i == $current_page)
			{
				$style = 'style="background:#cfcfcf;"';
			}

			$str .= '<li><a href="?page='.$i.' " '.$style.'>'.$i.'</a></li>';
		}

		if ($current_page != $total_pages)
		{
			$str .= '<li><a href="?page='.$next.'">&gt;</a></li>';
			$str .= '<li><a href="?page='.$total_pages.'">&gt;&gt;</a></li>';
		}

		$str .= '</ul>';
		$str .= '</div>';

		if ($result->num_rows)
		{
			return $str;
		}
		else
		{
			return '';
		}
	}
}

?>