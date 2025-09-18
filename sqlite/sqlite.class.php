<?php
class Patients
{
    public $id;
    public $name;
    public $age;
    public $mobile;

    public function __construct($_id, $_name, $_age, $_mobile)
    {
        $this->id = $_id;
        $this->name = $_name;
        $this->age = $_age;
        $this->mobile = $_mobile;
    }

    public function save()
    {
        global $db;

        $save = $db->query("INSERT INTO patients (id, name, age, mobile) VALUES 
      (NULL, '{$this->name}', {$this->age}, '{$this->mobile}')");



        if ($save) {
            return "Data saved";
        }
    }

    public static function getAll()
    {
        global $db;

        $data = $db->query("select * from patients");
        $html = "<table>";
        $html .= "<tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>mobile</th>
            <th>action</th>
             
            </tr>";
        while ($row = $data->fetchObject()) {
            $html .= "<tr>
            <td>{$row->id}</td>
            <td>{$row->name}</td>
            <td>{$row->age}</td>
            <td>{$row->mobile}</td>
            <td>
            <button><a href='show.details.php?edit={$row->id}'>Edit</a></button>
            <button><a href='show.details.php?delete={$row->id}'>Delete</a>  
            </button>
            </td>
            
            </tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public static function delete($id)
    {
        global $db;
        $delete = $db->query("delete from patients where id=$id");
        if ($delete) {
            return true;
        }
    }

    public function update()
    {
        global $db;
        $update = $db->query("update patients set id='$this->id',name='$this->name', age='$this->age', mobile='$this->mobile' where  id=$this->id");
        if ($update) {
            return true;
        }
    }
    public static function search($id)
    {
        global $db;
        $search = $db->query("select * from patients where id=$id");

        $data = $search->fetch();
        if ($data) {
            return $data;
        } else {
            return "Data not found";
        }
    }
}

//     $search_student=null;
//   if(isset($_GET['EditId'])){
//     $id= $_GET['EditId'];
//     $search_student =  Student::search($id);
