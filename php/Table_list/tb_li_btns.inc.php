<?php
	session_start();

    if(isset($_POST["tb_li_ord"]))
    {
        if(!isset($_SESSION["tb_li_ord"]["camp"]) || $_SESSION["tb_li_ord"]["camp"] != $_POST["tb_li_name_camp"])
        {
            $_SESSION["tb_li_ord"]["camp"]      = $_POST["tb_li_name_camp"];
            $_SESSION["tb_li_ord"]["method"]    = "ASC"; 
        }else{
            if($_SESSION["tb_li_ord"]["method"] == "DESC")
            {
                $_SESSION["tb_li_ord"]["method"] = "ASC"; 
            }else{
                $_SESSION["tb_li_ord"]["method"] = "DESC"; 
            }
        }
    }

    if(isset($_POST["tb_li_exc"]))
    {
        $id = $_POST["tb_li_exc"];

        switch($_SESSION["tb_li_href"])
        {
            case "index.php":
                $sql = "DELETE FROM administrador WHERE id_admin = $id";
                break;
        }

        $res = mysqli_query($con, $sql);
    }

    if(isset($_POST["tb_li_btn_back"]))
    {
        $_SESSION["tb_li_pag"] = $_POST["tb_li_back"];
    }

    if(isset($_POST["tb_li_btn_next"]))
    {
        $_SESSION["tb_li_pag"] = $_POST["tb_li_next"];
    }

    session_write_close(); 
?>