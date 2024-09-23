<?php
    include('config/conn.php');

    $qusers = "SELECT * FROM users";
    $res = mysqli_query($con , $qusers);
    $totalUsersNum = mysqli_num_rows($res);
    if($totalUsersNum > 0)
    {
        $pay = 100 / $totalUsersNum;
        while($user = mysqli_fetch_array($res))
        {
            echo '<tr>
                <td>'.$user['name'].'</td>
                <td>'.$user['email'].'</td>
                <td>'.$pay.'€</td>
            </tr>';
        }
    }
    else
    {
        echo '<td colspan="6">
                No data found
            </td>';
    }
?> 