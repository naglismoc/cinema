
<body>
<?php include("./layout/header.php");?>

<?php


include(Controllers."/UserController.php");

if(isset($_GET["logout"])){
    logout(); 
    header("location:".views);
    die;
}

?>



    <h1>homepage</h1>

    <?php $tekstas = 'labas rytas';
        echo ' <script> 
        var gautasTekstas ="'.$tekstas.'"; 
        </script>' 
    ?>

   <script>
        let darVienasKintamasis = <?='"'.$tekstas.'"'?>;
        console.log(darVienasKintamasis);
        console.log(gautasTekstas);
   </script>
   <?php include("./layout/footer.php");?>
</body>
</html>