<?php
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
try{
    $pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
}catch(PDOException $e){
    die('数据库连接失败:' . $e->getMessage());
};

$stmt = $pdo->query('select * from news');
$rows = $stmt->fetchAll();
//echo '<pre>';
//var_dump($rows);
//echo '</pre>';
include ('./view/index.html');
//class Page
//{
//    public $pdo;
//    public function __construct()
//    {
//        $db = array(
//            'dsn' => 'mysql:host=localhost;dbname=wui1805;port=3306;charset=utf8',
//            'username' => 'root',
//            'password' => '',
//            'charset' => 'utf8',
//        );
////连接
//        $options = array(
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        );
//        try {
//            $pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
//        } catch (PDOException $e) {
//            die('数据库连接失败:' . $e->getMessage());
//        };
//    }
//    public function actionindex()
//    {
//        include ("./view/index.html");
//    }
//    public function actionsearch()
//    {
//        include ("./view/search.html");
//    }
//    public function actioncategory()
//    {
//        include ("./view/category.html");
//    }
//
//
//}
//$page = new Page();
//if(isset($_GET['action'])){
//    $method = 'action'.$_GET['action'];
//}else{
//    $method= 'actionindex';
//}
//
//$page->$method();