<!-- Navbar -->
<nav class="navbar navbar-default main-nav">
    <div class="container-fluid">
        <div class="w970">
            <div class="t-menu">
                <a href="/"><div class="logo"></div></a>
                <ul class="tm">
                    <li><a href="/news">Акции и новости</a></li>
                    <li><a href="/gallery">Наши работы</a></li>
                    <li><a href="/pages/view/О-компании">О компании</a></li>
                    <li><a href="/pages/view/Контакты">Контакты</a></li>
                </ul>
                <div class="row top-phone-bl">
                    <div class="col-xs-2">
                        <ul class="row list-group">
                            <li class="list-group-item top-phone">+38 (097) 433-00-87</li>
                            <li class="list-group-item"><a href="#modal" onclick="getElementById('idItem').value='ЗАКАЗАТЬ ЗВОНОК!';" class="call-modal"><button type="submit" class="btn top-btn">Заказать звонок!</button></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid top2-nav">
        <div class="w970">
            <ul class="nav nav-pills">
                <li role="presentation" class="dropdown">
                    <a class="top-cat-but" href="/products/view_sub/1">
                        Жалюзи <span class="caret"></span>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/products/view_sub/1" role="button" aria-haspopup="true" aria-expanded="false">
                            Жалюзи <span class="caret"></span>
                        </a>
                    </a>
                    <!-- -->
                    <ul class="dropdown-menu drop-big ">
                        <li><a href="/products/view_sub/2"><span class="blue">Горизонтальные</span></a></li>
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 2) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>

                        <li><a href="/products/view_sub/6"><span class="blue">Вертикальные</span></a></li>
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 6) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>

                        <li><a href="/products/view_sub/10"><span class="blue">Деревянные и бамбуковые</span></a></li>
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 10) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>
                    </ul>
                    <!-- -->
                </li>
                <li role="presentation" class="dropdown">
                    <a class="top-cat-but" href="/products/view_sub/13">
                        Ролеты <span class="caret"></span>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/products/view_sub/2" role="button" aria-haspopup="true" aria-expanded="false">
                            Ролеты <span class="caret"></span>
                        </a>
                    </a>
                    <!-- -->
                    <ul class="dropdown-menu drop-big2">
                        <li><a href="/products/view_sub/14"><span class="blue">Системы открытого типа</span></a></li>
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 14) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>
                        <li><a href="/products/view_sub/21"><span class="blue">Системы закрытого типа</span></a></li>
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 21) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>
                        <li><a href="/products/view_sub/26"><span class="blue">Системы день-ночь</span></a></li>
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 26) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>
                            <!-- -->
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 31) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="<span class='blue'>".$item['title']?></span></a><?php
                            }
                            }?>
                            <!-- -->
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 32) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="<span class='blue'>".$item['title']?></span></a><?php
                            }
                            }?>
                            <!-- -->
                    </ul>
                    <!-- -->
                </li>
                <li role="presentation" class="dropdown">
                    <a class="top-cat-but" href="/products/view_sub/33">
                        Плиссе <span class="caret"></span>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/products/view_sub/3" role="button" aria-haspopup="true" aria-expanded="false">
                            Плиссе <span class="caret"></span>
                        </a>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 33) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>
                            <!--  -->
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a class="top-cat-but" href="/products/view_sub/38">
                        Антимоскитные сетки <span class="caret"></span>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/products/view_sub/4" role="button" aria-haspopup="true" aria-expanded="false">
                            Антимоскитные сетки <span class="caret"></span>
                        </a>
                    </a>
                    <ul class="dropdown-menu drop-big3">
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 38) {
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>
                            <!--  -->
                    </ul>
                </li>
                <!-- Outsytem -->
                <li role="presentation" class="dropdown out-syst">
                    <a class="top-cat-but" href="/products/view_sub/42">
                        Внешние системы солнцезащиты <span class="caret"></span>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Внешние системы солнцезащиты <span class="caret"></span>
                        </a>
                    </a>
                    <ul class="dropdown-menu drop-big4">
                        <li><a href="/products/view_sub/49">- Маркизы</a></li>
                        <?php
                        foreach($data['menu'] as $item){
                        if( $item['parent_id'] == 50 OR $item['parent_id'] == 51 OR $item['parent_id'] == 52
                        OR $item['parent_id'] == 53 OR $item['parent_id'] == 54){
                        ?><li><a href="/products/view/<?=$item['alias']?>"><?="- ".$item['title']?></a> <?php
                            }
                            }?>
                            <!--  -->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar end -->