<?php include("../functions.php"); if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) )  header("Location: login.php"); if($_SESSION['user_level'] != "admin") header("Location: login.php"); ?> <?php include 'header.php'; ?><div class="col-12 col-md-3"> <img class="img-fluid" src="https://1.bp.blogspot.com/-j8Kfcf7lhoo/YKjSlgm4EbI/AAAAAAAAOEE/RpFC0buyj0QKz-icZYTGyfwwZi0fdhwgwCLcBGAsYHQ/s512/abang%2Bresto.png"/></div><div class="col-12 col-md-6 p-3 p-md-5 text-center"> <nav><div class="nav nav-tabs" id="nav-tab" role="tablist"> <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Welcome</button> <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Installation</button> <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Get Start</button></div> </nav><div class="tab-content" id="nav-tabContent"><div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><p>Welcome to bang resto web apps. - develope wong suroboyo sing kerjo nok axcora technolog aplikasi iki asline digae sing butuh aplikasi restoran ben gak ruwet karo cepet gae dodolan , nek enek sing gratis lapo tuku sing mbayar yo gak cak.</p><p> Bang resto web apps is present by <a href="https://axcora.com">axcora technology</a> for helping your restaurant cafe bussiness, with clouds installation make our work very fast and simple using bang resto web apps. this is a open source code and free for download you can change any code with your own, lets get started with bang resto web apps, and don't forget donation for we developer team to make best application again.</p></div><div class="tab-pane fade p-3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><p> Bang resto web apps is a fully clouds online application , so you need to upload this source code on your shared clouds hosting. Login on cpanel hosting then click on mysql db - create new database name it with bangresto , then back on cpanel host again , click on php myadmin then click on bangresto database - click import and upload bangresto.mysql file on your source code download folder,back again on cpanel host open file manager , open public_html folder create new folder name it with your apps if you wana work on directori ,or just upload on root if you wan to work on root , and upload this source code extract all, change conffiguration database on config.php your resto apps is online now.</p></div><div class="tab-pane fade p-3" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><p> For first you need to login on admin area, then login using username : admin and password : password, after login you can create user account menu on staff , click on staff create and name it your user including account, like waiters or kitchen, then save it and now your staff is already work with this apps.</p><p> Waiters for noted customer order then they can sent order to kitchen, and kitchen can see all customer order including update status like prepare or ready, then admin can see all details transaction like order, kitchen display and progress, of course with income profit report details.</p></div></div></div><div class="col-12 col-md-3 p-3"><div class="p-3 p-md-5 bg-dark text-white"><p> Try Premium Restaurant app integration with website and android application for restaurant cafe</p> <a href="https://www.youtube.com/watch?v=tNBRSJKN8N0" class="btn btn-outline-warning col-12">Resto-X</a> <a href="https://www.youtube.com/watch?v=7wEQlkKZPpg" class="btn btn-outline-warning col-12">Mr.Resto</a> <a href="https://www.youtube.com/watch?v=5G6yK6vhOi0" class="btn btn-outline-warning col-12">Boosterpos</a> <a href="https://www.youtube.com/watch?v=FCm4ijsw5FE" class="btn btn-outline-warning col-12">DXResto</a></div></div><div class="col-12 col-md-12"><div class="border border-dark rounded p-3 text-center"> Donate now use money transfer like western union or moneygram and sent order to we bank account.<br/> BANK CENTRAL ASIA <br>ACCOUNT NO : 0181884109 <br>ACCOUNT NAME : SUCI CHANIFAH <br>IBAN/SWIFT CODE : CENAIDJA</div></div><?php include 'footer.php'; ?>