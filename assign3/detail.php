<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="applicant's info" />
    <meta name="Keywords" content="about me, timetable" /> 
    <meta name="author" content="Junhyek Hyun"/>
        <link rel="stylesheet" href="styles/style.css" />
            <title>Position Available Melbourne Red Cross</title>
</head>
<body class="container">
    <?php
        include("header.inc");
        include("menu.inc");
    ?>
<!--front image right under navigation bar-->
    <img src="styles/images/postion_header_img.jpg" alt="header_img" id="postion.html_frontimg" class="front_img"/>
<!--front image right under navigation bar ends-->
<!--section_1 starts covering dl and email-->
<section id="sectiondl">
    <h3>Details about candidates</h3>
    <dl>
        <dt class="dtitle">Name: </dt>
            <dd>Junhyek Hyun</dd>
    </dl>
    <dl>
        <dt class="dtitle">Student ID: </dt>
            <dd>102524337</dd>
    </dl>
    <dl>
        <dt class="dtitle">Name of Tutor: </dt>
            <dd>Xiaoyu Xia</dd>
    </dl>
    <dl>
        <dt class="dtitle">Current Enrolled Courses: </dt>
            <dd>1.OOP, 2.CWA, 3.SPM, 4.MBSM</dd>
    </dl>
    <dl>
        <dt class="dtitle">Home Town: </dt>
            <dd>My hometown is Cheonan where is one of well-known cities in Chungcheongnam province.
                The hometown is also known as a symbol of patriotism due to many people from this city contributed
                to kingdoms existed in Korea. 
            </dd>
    </dl>
    <p>
        Email Link:
        <a href="mailto:102524337@student.swin.edu.au">Send Mail</a>
    </p>
</section>
<!--section_1 ends-->
<!--image-->
    <figure>
        <img src="styles/images/IU.jpg" alt="IU"/>
    </figure>
    <aside id="asidedetailhtml">
        <p id="img_aside_detailhtml"><img src="styles/images/donation.jpg" alt="donation_image"/></p>
        <h4>"One Dollar for 30 days will support Children with better care"</h4>
    </aside>
<!--image part ends-->
<!--table covered by section-->
    <section id="tsection">
        <table>
            <caption>Time Table Swinburne University</caption>
            <thead>
            <tr>   
                <th class="time"></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
            </thead>
        <tbody>
            <tr>
                <td class="time">08 A.M.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="time">09 A.M.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="time">10 A.M.</td>
                <td class="MBSM">INF60013: MBSM</td>
                <td></td>
                <td ></td>
                <td class="SPM">INF70005: SPM</td>
                <td></td>
            </tr>
            <tr>
                <td class="time">11 A.M.</td>
                <td class="MBSM"></td>
                <td></td>
                <td></td>
                <td class="SPM"></td>
                <td></td>
            </tr>
            <tr>
                <td class="time">12 P.M.</td>
                <td class="MBSM"></td>
                <td></td>
                <td></td>
                <td class="SPM"></td>
                <td class="SPM">INF70005: SPM Lab</td>
            </tr>
            <tr>
                <td class="time">01 P.M.</td>
                <td></td>
                <td></td>
                <td></td>
                <td class="SPM"></td>
                <td></td>
            </tr>
            <tr>
                <td class="time">02 P.M.</td>
                <td class="MBSM">MBSM: Lab</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>                        
                <td class="time">03 P.M.</td>
                <td></td>
                <td></td>
                <td></td>                        
                <td></td>
                <td></td>
                </tr>
            <tr>
                <td class="time">04 P.M.</td>
                <td></td>
                <td></td>
                <td class="CWA">COS60004: CWA</td>
                <td class="OOP">COS70006: OOP Lab</td>
                <td></td>
            </tr>
            <tr>
                <td class="time">05 P.M.</td>
                <td></td>
                <td></td>
                <td class="CWA">COS60004: CWA</td>
                <td class="OOP"></td>
                <td></td>
            </tr>
            <tr>
                <td class="time">06 P.M.</td>
                <td></td>
                <td></td>
                <td class="CWA">COS60004: CWALab</td>
                <td class="OOP"></td>
                <td class="OOP">COS70006: OOP</td>
            </tr>
             <tr>
                <td class="time">07 P.M.</td>
                <td></td>
                <td></td>
                <td class="CWA"></td>
                <td class="OOP"></td>
                <td class="OOP"></td>
            </tr>
            <tr>
                <td class="time">08 P.M.</td>
                <td></td>
                <td></td>
                <td class="CWA"></td>
                <td></td>
                <td class="OOP"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="time">09 P.M.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="OOP"></td>
            </tr>
        </tfoot>   
        </table>
    </section>
<!--table ends-->
    //footer;
    <?php
        include("footer.inc");
    ?>
</body>
</html>