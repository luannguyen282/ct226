<?php 
       session_start();

       if (isset($_GET['test'])) {
              $_SESSION['test']=$_GET['test'];
       }


 ?>

<script type="text/javascript">
       function t(n){
              document.getElementById('test').value=n+1;
              document.getElementById('test').click();
       }
</script>

 <form method="GET">
       <input type="button" name="but" value="Button" onclick="t(<?php echo $_SESSION['test']; ?>);">
        <input type="submit" name="test" id="test" value=<?php echo $_SESSION['test']; ?>>
 </form>