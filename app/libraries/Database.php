<?php
/**
 * PDO database class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */

class Database {
  private $host = DB_HOST;
  private $user = DB_USER;
  private $password = DB_PASS;
  private $dbname = DB_NAME;
  private $port = DB_PORT;
  private $connection = DB_CONNECTION;
  public $row;
  private $dbh;
  private $stmt;
  private $error;

  public function __construct() {
    // Set DSN
    $dsn = "$this->connection:host=$this->host;dbname=$this->dbname";
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    /*
     * Create a PDO Instance
     */
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
    } catch(PDOException $e) {
      $this->error = $e->getMessage();
//      echo $this->error;
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
  }

  /*
   * Prepare statement with query
   */
  public function query($sql) {
    $this->stmt = $this->dbh->prepare($sql);
  }

  /*
   * Bind the values
   */
  public function bind($param, $value, $type = null){
    if(is_null($type)){
      switch(true){
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  /*
   *  Execute the prepared statement
   */
  public function execute() {
    return $this->stmt->execute();
  }

  /*
   * Get single record as object
   */
  public function all() {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  /*
   * Get single record as object
   */
  public function single() {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  /*
   * Get row count
   */
  public function rowCount() {
    $this->execute();
    return $this->stmt->rowCount();
  }

  /*
   * find the row with filter
   */
  public function findBy($param, $table, $input) {
    $this->query('SELECT * FROM ' . $table . ' WHERE ' . $param . ' =:' . $param);
    $this->bind(':' . $param, $input);
    $this->row = $this->single();
    return $this->row;
  }
	
  /*
   * find All
   */
  public function finaAll($table) {
		$this->query('SELECT * FROM ' . $table);
		return $this->all();
	}
	
	
  /*
   * get properties
   */
  protected function properties() {
    $properties = array();
    foreach (static::$fillable  as $db_field) {
      if(property_exists($this, $db_field)) {
        $properties[$db_field] = $this->$db_field;
      }
    }
    return $properties;
  }

  /*
 * Insert data to the database and the specific table
 */
  public function create() {
    $properties = $this->properties();
    $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
    $sql .= "VALUES ('". implode("','", ':' . array_values($properties)) ."')";
  }
}
