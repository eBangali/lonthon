<?php
namespace ebapps\dbconnection;
class eBConDb {
  private static $instance = null;
  private $eBCon;
  private function __construct()
  {
	$this->eBCon = new \mysqli(EB_HOSTNAME,EB_DB_USERNAME,EB_DB_PASSWORD,EB_DATABASE);
	if(mysqli_connect_errno())
	{
		die("Please check Database");
	}
  }
  
  public static function eBgetInstance()
  {
    if(!self::$instance)
    {
      self::$instance = new eBConDb();
    }
   
    return self::$instance;
  }
  
  public function eBgetConection()
  {
    return $this->eBCon;
  }
}
?>