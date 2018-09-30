<?php

namespace Database;

/**
 * Class Database
 */
class Database
{
  /**
   * __construct
   * The constructor implements $db->connect() private method which establishes connection to database
   */
  public function __construct()
  {
      $this->connect();
  }
  /**
   * $link
   * Property contains PDO object which generates in $db->connect private method.
   */
  private $link = '';
  /**
   * $db_config
   * Property contains database config which based in config/config.db.php. Used in $db->connect() private method.
   */
  private $db_config = '';
  /**
   * connect()
   * Main private method which is called in constructor and establishes connection to the database
   */
  private function connect()
  {
    $this->db_config = require __DIR__ . '/config/config.db.php';

    $dsn = "mysql:host=" . $this->db_config['host'] . ";dbname=" . $this->db_config['db_name'] . ";charset=" . $this->db_config['charset'] . ";";
    $user = $this->db_config['username'];
    $password = $this->db_config['password'];
    $opt = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $this->link = new \PDO($dsn, $user, $password, $opt);

    return $this;
  }
  /**
   * query()
   * Public method which executes simple SQL-request in specified mode ( insert or select )
   */
  public function query($sql, $request_mode = '')
  {
    if ( $request_mode === 'insert' ) {
      $this->link->query($sql);
    }
    else if ( $request_mode === 'select' ) {
      return $this->link->query($sql);
    }
  }
  /**
   * prepared_query()
   * Altenative public method for query() but more secure because of using prepared statements.
   */
  public function prepared_query($sql, $placeholders, $request_mode = '')
  {
    if ( $request_mode === 'insert' ) {
      $stmt = $this->link->prepare($sql);
      $stmt->execute($placeholders);
    }
    else if ( $request_mode === 'select' ) {
      $stmt = $this->link->prepare($sql);
      $stmt->execute($placeholders);

      return $stmt;
    }
  }
  /**
   * fetch()
   * Public method which fetches one particular post from database
   */
  public function fetch($sql, $fetch_mode)
  {
    return $this->query($sql, 'select')->fetch($fetch_mode);
  }
  /**
   * fetchAll()
   * Public method which fetches a bunch of posts from database
   */
  public function fetchAll($sql, $fetch_mode)
  {
    return $this->query($sql, 'select')->fetchAll($fetch_mode);
  }


}
