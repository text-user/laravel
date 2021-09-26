<?php
require_once('env.php');

Class Dbc{
    protected $table_name;

    // 1.データベース接続
    // 引数なし
    // 返り値：接続結果を返す

    protected function dbConnect(){
        $dbname = DB_NAME;
        $host   = DB_HOST;
        $user   = DB_USER;
        $pass   = DB_PASS;
        $dsn    = "mysql:dbname=$dbname;host=$host;charset=utf8";

    try{
        $dbh = new PDO($dsn,$user,$pass,);

    } catch (PDOException $e) {
        print 'db接続エラー:' .$e->getMessage();
        exit();
    };

    return $dbh;
    }

// 2.データを取得する
// 引数なし
// 取得したデータを返す
    public function getAll(){
        $dbh = $this->dbConnect();
        // sql文の準備
        $sql = "SELECT * FROM $this->table_name";
        // sqlの実行
        $stmt = $dbh->query($sql);
        // sqlを受け取る
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }



// 引数: $id
// 返り値: result
    public function getById($id) {
        if(empty($id)) {
            exit('IDが不正です');
        }

        $dbh = $this->dbConnect();

        // SQL準備
        $stmt = $dbh->prepare("SELECT * FROM $this->table_name WHERE id = :id");
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        // SQL実行
        $stmt->execute();
        // 結果を取得
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            exit('ブログがありません');
        }
        return $result;
    }

    public function delete($id){
        if(empty($id)) {
            exit('IDが不正です');
        }

        $dbh = $this->dbconnect();

        // SQL準備
        $stmt = $dbh->prepare("DELETE FROM $this->table_name WHERE id = :id");
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        // SQL実行
        $stmt->execute();
        print("ブログを削除しました");
    }

}
?>