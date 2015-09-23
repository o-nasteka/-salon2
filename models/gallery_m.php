<?php
class gallery_m extends Model{
//

    public function list_gallery()
    {

        $sql = "SELECT * FROM `gallery`";


        return $this->db->query($sql);
    }

    // ������� �� id
    public function view_id($id){
        $id = (int)$id;
        $sql = " SELECT * FROM `gallery` WHERE `id` = '{$id}' LIMIT 1 ";

        return $this->db->query($sql);
    }

    // �������������� ��������� �������
    public function edit_gallery($id){

        $id = (int)$id;

        // ������� ������� ������ � �����, � ��������� mysqli_escape_string � ������� POST
        foreach($_POST as $k=>$v) {
            $_POST[$k] = $this->db->escape(trim($v));
        }

        $sql = "
		UPDATE `gallery` SET
		`title`       = '".($_POST['title'])."'
		WHERE `id` = ".$id."
	";
        return $this->db->query($sql);
    }







}

