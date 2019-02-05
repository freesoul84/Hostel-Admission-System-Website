  <?php
//code for exporting the data
  include("config.php");
  if(isset($_POST["export"])){
    session_start();
       $connect=mysqli_connect('localhost','root','alkesha15','malaygiri_hostel');
      header('Content-Type: text/csv; charset=utf-8');
       header('Content-Disposition: attachment; filename=approvelist.csv');
       $output = fopen("php://output", "w");
       fputcsv($output, array('seatno','fullname', 'department', 'year', 'cast','sgpa','cgpa'));

      $selection=$_SESSION['branchwise'];
      $selection=$_SESSION['yearwise'];
  echo $selection;
      if($selection=="branchwise")
      {
        $department=$_SESSION['department'];
        $year=$_SESSION['year'];
        if($year=="Third Year")
        {
          $table="tyapprove";
        }
        else {
          $table="fyapprove";
        }
        $query = "SELECT * from $table where department='$department' AND year='$year'";
        $result = mysqli_query($connect, $query);
      }
      if($selection=="yearwise")
      {
        $year=$_SESSION['year'];
        if($year=="Third Year")
        {
          $table="tyapprove";
        }
        else {
          $table="fyapprove";
        }
        $query = "SELECT * from $table where year='$year'";
          $result = mysqli_query($connect, $query);
      }
       while($row = mysqli_fetch_assoc($result))
       {
            fputcsv($output, $row);
       }
       fclose($output);
  }
   ?>
