<?php
include_once 'common.class.php';

class Categories extends Common
{
	public function __construct()
	{
		parent::__construct();
		$this->table = 'categories';
	}

	/**
	 * Gets all users records.
	 *
	 * @return array  All users.
	 * 
	 */
	public function showCategories()
	{
		$sql="SELECT a.id, a.name,a.description, b.name AS 'ParentName' FROM categories AS a LEFT JOIN categories AS b on a.parent_id = b.id " ;
		$result = $this->connection->query($sql);
		return $result;
	}
	public function getAllData()
	{
		//$this->where = 'is_admin = 0';
		$this->order = 'name ASC';


		$result = $this->showCategories();
		$categories  = array();

		while ($row = $result->fetch_assoc())
		{
			$categories[] = $row;
		}

		$data['records']       = $categories;
		$data['total_records'] = $result->num_rows;

        return $data;
        
	} 

	//Data one record read Function
	public function fetchonerecord($id)
	{
		$oneresult="SELECT a.id, a.name,a.description, b.name AS 'ParentName' FROM categories AS a LEFT JOIN categories AS b on a.parent_id = b.id " ;
		$result = $this->connection->query($oneresult);
		return $result;
    }

	/*
	*
	*add category
	*
	*/
	public function addcategory($name,$description, $parent_id)
	{

		$data['name'] ='"'. $name.'"';
		$data['description'] ='"'.$description.'"';
		$data['parent_id'] ='"'.$parent_id.'"';

		$this->add($data);
	}
	/*
	*
	*
	*
	*edit categories
	*
	*/

	public function editCategory($id,$name,$description, $parent_id)
	{
			$id	    	= $id;

			$data['name'] ="'".$name."'";
			$data['description'] ="'".$description."'";
			$data['parent_id'] ="'".$parent_id."'";
			

			$this->edit($id,$data);
	}


    //delete single records
    public function deleteCategory($id)
	{
		
		$del=$this->delete($id);
		echo $del;

	}



	/*
	*
	delete selected records
	*
	*/
	public function deleteAllCategories($checkbox)
	{
		
		$del=$this->deleteAll($checkbox);
		echo $del;

	}

	

}



?>