

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
        <?php include_once('style.css'); ?>
    </style>
</head>

<body>
    <script>


   

    </script>
    <div class="header">
        
        <div class="header_content">
            <marquee behavior="fast" direction="left"><span>**Welcome to Admin page** <sub>restricted</sub>information here shuold not be disclosed to iapropriate authority</span></marquee>
        <div class="links">
            <form  method="post">
            <button name="candman" type="submit">Candidate_management</button><button name="Qman"
                type="submit">QuestionsManagement</button><button type="submit" name="general">general</button>
            </form>
           
        </div>
        </div>
    </div>
<?php  
 
if(isset($_POST['candman'])or isset($_POST['all'])){
 echo   "<div class='error'>good</div>";
 
require '../dbconnect.php';
$select_registerd_query = " SELECT `id`, `fullname`, `email`, `mobile`,`subscribed`,`subscription_type`, `reg_date` FROM `registerd_candidates` WHERE `verification` = 1 ORDER BY `id` ASC ";
$select_query_result = mysqli_query($conn,$select_registerd_query);
if($select_query_result){
 $row = mysqli_num_rows($select_query_result);

        ?>
            <div class='candidates_container'>
             <form  method="post"><button type='submit' name='all' id='info' class="info"> <span> REGISTERD CANDIDATES (all)<br><?php echo($row);?></span> </button>
                <button type='submit' name='sub' class="info"> <span> SUBSCRIBED CANDIDATES <br><?php echo($row);?></span> </button>
                <button type='submit' name='unsub' class="info"> <span> UNSUBSCRIBED CANDIDATES <br><?php echo($row);?></span> </button>
                <button type='submit' name='unv' class="info"> <span> UNVERIFIED CANDIDATES <br><?php echo($row);?></span> </button>
                </form>   
                </div>
        <table >
            
        <tr>
        <th>id</th>
            <th>fullname</th>
            <th>email</th>
            <th>mobile</th>
            <th>sub_status</th>
            <th>subscription_type
                <th>date_registerd</th>
                <th>action</th>
            </th>
        </tr>
      <?php  while($fetch=mysqli_fetch_assoc($select_query_result)){?>
        <tr>
        <td><?php echo $fetch['id']?></td>
        <td><?php echo $fetch['fullname']?></td>
            <td><?php echo $fetch['email']?></td>
            <td><?php echo $fetch['mobile']?></td>
            <td><?php echo $fetch['subscribed']?></td>
            <td><?php echo $fetch['subscription_type']?></td>
            <td><?php echo $fetch['reg_date']?></td>
            <td>
                 <form  method="post">   <button type='submit' name='id'> action</button></form>
            </td>
        </tr>
      
     <?php   }?></table>
    
         </div>; 
<?php         }
        }
      

       if (isset($_POST['id']))
        
        { 
            
            
            
            header('location: adminpage2.php');
            
        ?>
 <table >
            
          
          
        </table>
 <?php 
             }?>            
</body>

</html>