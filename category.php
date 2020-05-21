<!DOCTYPE html>
<html>
<head>
<!-- Rollover Demonstration Program -->
<!-- Written by Bernard Doyle -->

<style type="text/css">
</style>


<script language="javascript">

function displaygraphic(option)
{

    var frozen_food = document.getElementById('frozen_food');
    frozen_food.style.zindex=0;

    var fresh_food = document.getElementById('fresh_food');
    fresh_food.style.zindex=0;

    var beverages = document.getElementById('beverages');
    beverages.style.zindex=0;

    var home_health = document.getElementById('home_health');
    home_health.style.zindex=0;

    var pet_food = document.getElementById('pet_food');
    pet_food.style.zindex=0;



    fresh_food.style.visibility="hidden";
    frozen_food.style.visibility="hidden";
    beverages.style.visibility="hidden";
    home_health.style.visibility="hidden";
    pet_food.style.visibility="hidden";


    if (option == 1 )
    {
        frozen_food.style.zindex=5;
        frozen_food.style.visibility="visible";
    }
    if (option == 2 )
    {
        fresh_food.style.zindex=5;
        fresh_food.style.visibility="visible";
    }
    if (option == 3 )
    {
        beverages.style.zindex=5;
        beverages.style.visibility="visible";
    }

  if (option == 4 )
  {
      home_health.style.zindex=5;
      home_health.style.visibility="visible";
  }
    if (option == 5 )
    {
        pet_food.style.zindex=5;
        pet_food.style.visibility="visible";
    }

}

</script>
</head>

<body>

<body style="background-color:#EEE2DC;"></body>

<div id="display_area" name="display_area">

<img src="images/level1.png"
     width="720"
     height="300"
     style="z-index: 0;
     position: relative;
     left: 45px;
     border=""
     usemap="#main_category">

<map name="main_category">
    <area shape="rect" coords="35,199,145,280" onmouseover="displaygraphic(1); return true">
    <area shape="rect" coords="175,199,280,280" onmouseover="displaygraphic(2); return true">
    <area shape="rect" coords="315,205,428,280" onmouseover="displaygraphic(3); return true">
    <area shape="rect" coords="460,205,565,280" onmouseover="displaygraphic(4); return true">
    <area shape="rect" coords="595,205,706,280" onmouseover="displaygraphic(5); return true">
</map>

</div>


<map name="frozen_food">
    <area shape= "rect" coords= "25,199,115,280"  href="viewproduct.php?product_id=1000" target="top_right">
    <area shape= "rect" coords= "135,199,225,280" href="viewproduct.php?product_id=1001" target="top_right">
    <area shape= "rect" coords= "245,199,335,280" href="viewproduct.php?product_id=1003" target="top_right">
    <area shape= "rect" coords= "365,199,463,280" href="viewproduct.php?product_id=1004" target="top_right">
    <area shape= "rect" coords= "475,199,573,280" href="viewproduct.php?product_id=1005" target="top_right">
    <area shape= "rect" coords= "605,199,700,280" href="viewproduct.php?product_id=1002" target="top_right">
</map>

<map name="fresh_food">
    <area shape= "rect" coords= "10,199,100,280"  href="viewproduct.php?product_id=3002" target="top_right">
    <area shape= "rect" coords= "120,199,210,280" href="viewproduct.php?product_id=3000" target="top_right">
    <area shape= "rect" coords= "222,199,310,280" href="viewproduct.php?product_id=3001" target="top_right">
    <area shape= "rect" coords= "332,199,420,280" href="viewproduct.php?product_id=3003" target="top_right">
    <area shape= "rect" coords= "432,199,520,280" href="viewproduct.php?product_id=3004" target="top_right">
    <area shape= "rect" coords= "532,199,615,280" href="viewproduct.php?product_id=3006" target="top_right">
    <area shape= "rect" coords= "632,199,715,280" href="viewproduct.php?product_id=3007" target="top_right">
    <area shape= "rect" coords= "732,199,815,280" href="viewproduct.php?product_id=3005" target="top_right">
</map>

<map name="beverages">
    <area shape= "rect" coords= "10,199,110,280"  href="viewproduct.php?product_id=4003" target="top_right">
    <area shape= "rect" coords= "125,199,230,280" href="viewproduct.php?product_id=4004" target="top_right">
    <area shape= "rect" coords= "250,199,355,280" href="viewproduct.php?product_id=4000" target="top_right">
    <area shape= "rect" coords= "365,199,468,280" href="viewproduct.php?product_id=4001" target="top_right">
    <area shape= "rect" coords= "481,199,584,280" href="viewproduct.php?product_id=4002" target="top_right">
    <area shape= "rect" coords= "605,199,708,280" href="viewproduct.php?product_id=4005" target="top_right">
</map>

<map name="home_health">
    <area shape= "rect" coords= "10,199,112,280"  href="viewproduct.php?product_id=2000" target="top_right">
    <area shape= "rect" coords= "118,199,222,280" href="viewproduct.php?product_id=2001" target="top_right">
    <area shape= "rect" coords= "245,199,347,280" href="viewproduct.php?product_id=2002" target="top_right">
    <area shape= "rect" coords= "358,199,460,280" href="viewproduct.php?product_id=2005" target="top_right">
    <area shape= "rect" coords= "475,199,573,280" href="viewproduct.php?product_id=2006" target="top_right">
    <area shape= "rect" coords= "595,199,695,280" href="viewproduct.php?product_id=2003" target="top_right">
    <area shape= "rect" coords= "705,199,805,280" href="viewproduct.php?product_id=2004" target="top_right">
</map>

<map name="pet_food">
    <area shape= "rect" coords= "16,199,132,280"  href="viewproduct.php?product_id=5001" target="top_right">
    <area shape= "rect" coords= "145,199,265,280" href="viewproduct.php?product_id=5000" target="top_right">
    <area shape= "rect" coords= "285,199,405,280" href="viewproduct.php?product_id=5002" target="top_right">
    <area shape= "rect" coords= "435,199,555,280" href="viewproduct.php?product_id=5003" target="top_right">
    <area shape= "rect" coords= "585,199,695,280" href="viewproduct.php?product_id=5004" target="top_right">

</map>

<img src="images/frozen_food.png"
     id="frozen_food"
     width="720"
     height="300"
     border="0"
     style="z-index: 0;
     position: relative;
     top: -36px;
     left: -14px;
     visibility:hidden;"
     usemap="#frozen_food">

<img src="images/fresh_food.png"
     id="fresh_food"
     width="820"
     height="300"
     border="0"
     style="z-index: 0;
     position: absolute;
     top: 276px;
     left: 10px;
     visibility:hidden;"
     usemap="#fresh_food">

<img src="images/beverages.png"
     id="beverages"
     width="720"
     height="300"
     border="0"
     style="z-index: 0;
     position: absolute;
     top: 276px;
     left: -5px;
     visibility:hidden;"
     usemap="#beverages">

<img src="images/home_health.png"
     id="home_health"
     width="820"
     height="300"
     border="0"
     style="z-index: 0;
     position: absolute;
     top: 276px;
     left: 0px;
     visibility:hidden;"
     usemap="#home_health">

<img src="images/pet_food.png"
     id="pet_food"
     width="720"
     height="300"
     border="0"
     style="z-index: 0;
     position: absolute;
     top: 276px;
     left: 60px;
     visibility:hidden;"
     usemap="#pet_food">


</body>
</html>
