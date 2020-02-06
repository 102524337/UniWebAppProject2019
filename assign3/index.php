<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="index for other html pages" />
    <meta name="Keywords" content="project, red cross" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <link rel="stylesheet" href="styles/style.css"/>
    <title>Welcome to Red Cross Melbourne</title>
</head>
<body class="container">

<?php
    include("header.inc");
    include("menu.inc");
?>
<!--contents-->

<section id ="content">
    <article class="article_content">
    <h2 class="content">About Us</h2>
    <img src="styles/images/about_us.jpg" alt="about_us">
        <p class="para">
            "The International Committee of the Red Cross is an impartial, 
            neutral and independent organization whose exclusively humanitarian 
            mission is to protect the lives and dignity of victims of armed conflict 
            and other situations of violence and to provide them with assistance.
            We are specially located in <strong>MelBourne</strong> Australia contributing with a wide range of projects"
        </p>
    </article>
    <article class="article_content">     
    <h3 class="h3_index_html">Our Current Project</h3>
        <h4>Cancer Children Aiding</h4>
        <img class="what_we_do_img" src="styles/images/Children_cancer.jpg" alt="Child_with_a_caner"/>
       <img class="what_we_do_img" src="styles/images/blood_donation.jpg" alt="blood_donation"/>
            <p class="para">
                "Our Current project is to help children with cancer with offering early information to the parents
                And mostly funding for children's chemo-therapy. Children are likely experience psychological disorder 
                after the harsh chemo sessions. We are also focus on mental health for children with cancer in this project."
            </p>
    </article>
</section>
    <!--contents end-->
    <!--advertisement-->
    <aside class="ads">
       <img src="styles/images/volunteer.png" alt="we_need_you" id="intro_ads_img" class="ads_img"/>
       <h4>"We are looking for volunteers for a variety of positions!"</h4>
       <h5 class="h5_index_html">Health Professionals Scheme - Registered Nurse</h5>
        <a href="enhancements.html"><img src="styles/images/nurse.jpg" alt="advsertisement_1" class="ads_img"/></a>
        <br/>
        <h5 class="h5_index_html" >Maintanence scheme - Professional Cleaner (certificate IV)</h5>
        <img src="styles/images/cleaner.jpg" alt="advsertisement_2" class="ads_img"/>
    </aside>
    <!--footer-->
        <?php
            include("footer.inc");
        ?>

</body>
</html>