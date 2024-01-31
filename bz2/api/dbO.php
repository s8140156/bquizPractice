<?php 
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db02";
    //protected $dsn = "mysql:host=localhost;charset=utf8;dbname=bquiz";
    protected $pdo;
    protected $table;
    
    public function __construct($table)
    {
        $this->table=$table;
        //$this->pdo=new PDO($this->dsn,'s1120401','s1120401');
        $this->pdo=new PDO($this->dsn,'root','');
    }


    function all( $where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql =$this->sql_all($sql,$where,$other);
        return  $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function count( $where = '', $other = ''){
        $sql = "select count(*) from `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return  $this->pdo->query($sql)->fetchColumn(); 
    }
    private function math($math,$col,$array='',$other=''){
        $sql="select $math(`$col`)  from `$this->table` ";
        $sql=$this->sql_all($sql,$array,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col, $where = '', $other = ''){
        return  $this->math('sum',$col,$where,$other);
    }
    function max($col, $where = '', $other = ''){
        return  $this->math('max',$col,$where,$other);
    }  
    function min($col, $where = '', $other = ''){
        return  $this->math('min',$col,$where,$other);
    }  
    
    function find($id)
    {
        $sql = "select * from `$this->table` ";
    
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";
        } 
        //echo 'find=>'.$sql;
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    function save($array){
        if(isset($array['id'])){
            $sql = "update `$this->table` set ";
    
            if (!empty($array)) {
                $tmp = $this->a2s($array);
            } 
        
            $sql .= join(",", $tmp);
            $sql .= " where `id`='{$array['id']}'";
        }else{
            $sql = "insert into `$this->table` ";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";
        
            $sql = $sql . $cols . " values " . $vals;
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function del($id)
    {
        $sql = "delete from `$this->table` where ";
    
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " `id`='$id'";
        } 
        //echo $sql;
    
        return $this->pdo->exec($sql);
    }
    
    /**
     * 可輸入各式SQL語法字串並直接執行
     */
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    }

    private function a2s($array){
        foreach ($array as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        return $tmp;
    }

    private function sql_all($sql,$array,$other){

        if (isset($this->table) && !empty($this->table)) {
    
            if (is_array($array)) {
    
                if (!empty($array)) {
                    $tmp = $this->a2s($array);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $array";
            }
    
            $sql .= $other;
            // echo 'all=>'.$sql;
            // $rows = $this->pdo->query($sql)->fetchColumn();
            return $sql;
        } 
    }

}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:$url");
}


$Total=new DB('total');
$User=new DB('user');
$News=new DB('news');
$Que=new DB('que');
$Log=new DB('log');


if(!isset($_SESSION['visited'])){ //先判斷如果沒有session的值（通常在開新網頁時不會有session值 所以先判斷"沒有"seesion）, 就準備更新資料
    if($Total->count(['date'=>date('Y-m-d')])>0){  // but先判斷資料庫裡有沒有date(今(當)天的日期)的存在(使用count 看有沒有值);若使用find(要判斷是否是空陣列 因為是整筆資料)
        // count 找欄位'date'裡面的資料是今天
        $total=$Total->find(['date'=>date('Y-m-d')]);
        $total['total']++; //把total資料表裡面欄位'total'+1
        $Total->save($total);


    }else{
        $Total->save(['total'=>1,'date'=>date('Y-m-d')]);
        //資料庫沒有找到今天的瀏覽紀錄 則你就是今天第一位 所以就寫入資料庫(陣列)total欄位1,及新增今日日期
    }

    $_SESSION['visited']=1; //因為沒有session值 上面判斷完執行完資料庫後 增加session=1讓session記憶
    //在測試人數計次時 若改變日期後 要先關瀏覽器(完整關掉) 不然session會記錄著你在線的紀錄而不會更新人次


}

?>