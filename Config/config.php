<?php
 
/** Configuration Variables **/
 
define ('DEVELOPMENT_ENVIRONMENT',true);
 
define('DB_NAME', 'yourdatabasename');
define('DB_USER', 'yourusername');
define('DB_PASSWORD', 'yourpassword');
define('DB_HOST', 'localhost');
&#91;/sourcecode&#93;
 
Phew! Now let us create our first mini-todo application. We first create a database "todo" and execute the following SQL queries
 
&#91;sourcecode language="sql"&#93;
CREATE TABLE `items` (
  `id` int(11) NOT NULL auto_increment,
  `item_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
);
 
INSERT INTO `items` VALUES(1, 'Get Milk');
INSERT INTO `items` VALUES(2, 'Buy Application');
&#91;/sourcecode&#93;
 
Once that is done, we add item.php to our model folder with the following contents
 
&#91;sourcecode language="php"&#93;
<?php
 
class Item extends Model {
 
}
&#91;/sourcecode&#93;
 
Write it is empty, but will have more information when we expand our framework in Part 2.
 
Now create a file called itemscontroller.php in the controller folder
 
&#91;sourcecode language="php"&#93;
<?php
 
class ItemsController extends Controller {
 
    function view($id = null,$name = null) {
     
        $this->set('title',$name.' - My Todo List App');
        $this->set('todo',$this->Item->select($id));
 
    }
     
    function viewall() {
 
        $this->set('title','All Items - My Todo List App');
        $this->set('todo',$this->Item->selectAll());
    }
     
    function add() {
        $todo = $_POST['todo'];
        $this->set('title','Success - My Todo List App');
        $this->set('todo',$this->Item->query('insert into items (item_name) values (\''.mysql_real_escape_string($todo).'\')'));   
    }
     
    function delete($id = null) {
        $this->set('title','Success - My Todo List App');
        $this->set('todo',$this->Item->query('delete from items where id = \''.mysql_real_escape_string($id).'\''));   
    }
 
}