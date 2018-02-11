<?php
	function table_list ( $con, $sql, $tab_cols, $num_rows, $type, $pk, $alt_page, $cond_query )
	{
        $atual_page = explode ( "/", $_SERVER['PHP_SELF'] );
        $atual_page = end ( $atual_page );
        
        session_start( );

        if ( !isset ( $_SESSION["tb_li_href"] ) || $_SESSION["tb_li_href"] != $atual_page )
        {
            $_SESSION["tb_li_pag"]                  = 0;
            $_SESSION["tb_li_ord"]["camp"]          = "";
            $_SESSION["tb_li_ord"]["method"]        = "";
            $_SESSION["tb_li_href"]                 = $atual_page;
        }

        if ( $_SESSION["tb_li_ord"]["camp"] != "" )
        {
            $sql .= " ORDER BY";
            if ( count ( explode ( " ", $_SESSION["tb_li_ord"]["camp"] ) ) > 1 )
            {
                foreach ( explode (" ", $_SESSION["tb_li_ord"]["camp"] ) as $camp_word )
                {
                    $sql .= " $camp_word ".$_SESSION["tb_li_ord"]["method"].",";
                }
                $sql[strlen ( $sql ) - 1] = "";
            }
            else
            {
                $sql .= " ".$_SESSION["tb_li_ord"]["camp"]." ".$_SESSION["tb_li_ord"]["method"];
            }
        }

        $res = mysqli_query( $con, $sql );
        $rows = mysqli_fetch_all( $res, MYSQLI_ASSOC );

        echo "<table border='2'>";
        echo "<tr>";

        $cont = 0;

        foreach ( array_keys ( $tab_cols ) as $tab_col )
        {
            $cont++;

            echo "<th>";
            echo "<form name='tb_li_th_form_$cont' method='POST' action='$atual_page'>";
            echo "<input type='hidden' name='tb_li_name_camp' value='".$tab_cols["$tab_col"]."'/>";
            echo "<button type='submit' name='tb_li_ord'>$tab_col</button>";
            echo "</form>";
            echo "</th>";
        }

        if ( $type > 0 )
        {
            echo "<th colspan='".ceil ( $type / 2 )."'>Actions</th>";
        }

        echo "</tr>";

        $loop_begin    = 0;
        $loop_end      = 0;

        if ( count ( $rows ) > $num_rows )
        {
            $loop_begin     = $num_rows * $_SESSION["tb_li_pag"];
            $loop_end       = count ( $rows );
        }
        else
        {
            $loop_end       = count ( $rows );
        }

        for ( $cont = $loop_begin; $cont < $fim_loop; $cont++ )
        {   
            echo "<tr>";
            foreach ( $tab_cols as $tab_col )
            {
                if ( count ( explode ( " ", $tab_col ) ) > 1 )
                {
                    echo "<td>";
                    foreach ( explode ( " ", $tab_col ) as $word )
                    {
                        echo $rows[$cont]["$word"]. " ";       
                    }
                    echo "</td>";
                }
                else
                {
                    echo "<td>".$rows[$cont]["$tab_col"]."</td>";   
                }
            }

            if ( $type > 0 )
            {
                if ( $type == 1 || $type == 3 )
                {
                    echo "<td>";
                    echo "<form method='POST' action='$alt_page'>";
                    echo "<button type='submit' name='tb_li_alt' value='".$rows[$cont]["$pk"]."'>Edit</button>";
                    echo "</form>";
                    echo "</td>";
                }

                if ( $type == 2 || $type == 3 )
                {
                    echo "<td>";

                    $sql = $cond_query.$rows[$cont]["$pk"];
                    $res = mysqli_query ( $con, $sql );

                    if ( mysqli_num_rows ( $res ) == 0 )
                    {
                        echo "<form method='POST' action='$atual_page'>";
                        echo "<button type='submit' name='tb_li_exc' value='".$rows[$cont]["$pk"]."'>Delete</button>";
                        echo "</form>";
                    }
                    else
                    {
                        echo "<button disabled>In use</button>";   
                    }
                    echo "</td>";
                }
            }
            echo "</tr>";

            if ( $cont == $loop_begin + ( $num_rows - 1 ) )
            {
                break;
            }
        }
        echo "</table>";

        if ( count ( $rows ) > $num_rows )
        {
            echo "<form method='POST' action='$atual_page'>";

            $back   = 0;
            $next   = 0;

            if ( isset ( $_SESSION["tb_li_pag"] ) && $_SESSION["tb_li_pag"] > 0 )
            {
                $back = $_SESSION["tb_li_pag"] - 1;

                if ( ( $_SESSION["tb_li_pag"] ) <= ( int )( count ( $rows ) / $num_rows ) )
                {
                    $next = $_SESSION["tb_li_pag"] + 1;
                }
            }
            else
            {
                if ( !isset ( $_SESSION["tb_li_pag"] ) )
                {
                    $back = 1;
                }
                else
                {
                    $next = $_SESSION["tb_li_pag"] + 1;
                }
            }

            if ( $back == 0 && $_SESSION["tb_li_pag"] != 1 )
            {
                echo "<button disabled> < </button> ";
            }
            else
            {
                echo "<input type='hidden' name='tb_li_back' value='$back'/>";
                echo "<button type='submit' name='tb_li_btn_back'> < </button> ";
            }

            ?><span>Page <?=$_SESSION["tb_li_pag"] + 1?> of <?=ceil ( count ( $rows ) / $num_rows )?></span><?php

            if ( $next >= ceil ( count ( $rows ) / $num_rows ) )
            {
                echo " <button disabled> > </button>";
            }
            else
            {
                echo "<input type='hidden' name='tb_li_next' value='$next'/>";
                echo " <button type='submit' name='tb_li_btn_next'> > </button>";
            }
            echo "</form>";
        }
        session_write_close( );
    }
?>