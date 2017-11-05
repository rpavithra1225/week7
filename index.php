<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);


//instantiate the program object

//Class to load classes it finds the file when the progrm starts to fail for calling a missing class
class Manage {
    public static function autoload($class) {
        //you can put any file name or directory here
        include $class . '.php';
        include_once 'db.php';
        //include 'htmlTagsHelper.php';
    }
}

spl_autoload_register(array('Manage', 'autoload'));

//instantiate the program object
$obj = new main();

class main {

public function __construct()
    {
        $pageRequest = 'tableDisplay';
        if(isset($_REQUEST['page'])) {
            $pageRequest = $_REQUEST['page'];
        }
        
         $page = new $pageRequest;

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } else {
            $page->post();
        }
    }
}

abstract class page {
    protected $html;

    public function __construct()
    {
        $this->html .= htmlTagsHelper::htmlStart();
        $this->html .= htmlTagsHelper::getcss("styles.css");
        $this->html .= htmlTagsHelper::bodyStart();
    }
    public function __destruct()
    {
        $this->html .= htmlTagsHelper::bodyEnd();
        $this->html .= htmlTagsHelper::htmlEnd();
        displayHelper::printString($this->html);
    }

    public function get() {
        echo htmlTagsHelper::headingThree("Hi! Welcome This is default get message");
    }

    public function post() {
        print_r($_POST);
    }
}

class tableDisplay extends page 
{
    public function get()
    {
      
      $id = 6;
      $results = accounts::findWithCondition('<', $id);

      //print_r($results);

	  if(count($results) > 0)
	  {
	  	//Start of the table
        $table = htmlTagsHelper::tableStart();

		  //Headers of account table
		  $tableHeader = array('ID','Email','First Name','Last Name','Phone','Birthday','Gender','Password');

		  $displayData = displayHelper::displayData($tableHeader,TRUE);
          
		  foreach ($results as $row) {
		  	 	$displayData .= displayHelper::displayData($row,FALSE);
   	  	  }

	   $table .= $displayData;
	   $table.= htmlTagsHelper::tableEnd(); 
	 }else{
	    	echo '0 results';
	 }

      $this->html .= htmlTagsHelper::headingOne("Contents of 'Accounts' Table:",""		);
      $this->html.= htmlTagsHelper::paragraph("Total No. of records found whose id < ".$id." : ".sizeof($results));
      $this->html.= htmlTagsHelper::getlinebreak();
      $this->html .= $table;
    }
}

?>


