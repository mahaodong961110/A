<?php
class database{
    public $pdo;
    public function __construct()
    {
        $db = array(
            'dsn' => 'mysql:host=localhost;dbname=wui1805;port=3306;charset=utf8',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        );
//连接
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        try {
            $this->pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
        } catch (PDOException $e) {
            die('数据库连接失败:' . $e->getMessage());
        };

    }
}
class index extends database                 //extends database：继承上面的数据库。
{
    public function actionindex()
    {
        include('./view/admin.html');
    }
}
class news extends database
{
    public function actiondelete()
    {
        sleep(2);
        $count = $this->pdo->exec("delete from news where id=".$_GET['id']);
        echo $count;
    }
    public function actioninsert()
    {
        sleep(2);
        $stmt = $this->pdo->prepare("insert into news(title,dsc,content)values(?,?,?)");
        $stmt->bindValue(1,'');
        $stmt->bindValue(2,'');
        $stmt->bindValue(3,'');
        echo $stmt->execute();
    }
    public function actionupdate()
    {
        sleep(2);
        //改什么？  k :title/dsc/conent
        //改哪一个？ id
        //改成什么 ？
        $stmt = $this->pdo->prepare('update news set '.$_GET['k'].' = ? where id = ?');
        $stmt->bindValue(1, $_GET['v']);
        $stmt->bindValue(2, $_GET['id']);
        echo $stmt->execute();
    }
    public function actionindex()
    {
        $stmt = $this->pdo->query('select * from news');
        $rows = $stmt->fetchAll();
        include('./view/admin_news.html');
    }
}
class category extends database
{
    public function actionindex()
    {
        include('./view/admin_category.html');
    }

}
$class_name = $_GET['c'];
$method_name = 'action'.$_GET['m'];
$o = new $class_name();
$o->$method_name();