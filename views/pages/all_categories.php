
<!-- Вывести все категории -->
<div class='goods-bl'>
    <!-- -->

    <?php $i = 0; foreach($data['cat'] as $data){ ?>
        <?php   $i++; if($i == 4){break;}?> <!-- Ограничение вывода категорий по id category -->

       <a href="/products/view_sub/<?=$data['id']?>  ">
          <div class="jal-bl" >
                <div class="img-bl">
           <img src="<?=$data['img']?>" />
             <button class="btn s3-btn center-block">Посмотреть</button>
                </div>
                <div class="title">';<?=@$data['title']?>echo ' </div>
             <div  class="jal-in-bl" style="display: none !important;">
                    <ul>
                        <li>Standart</li>
                        <li>Venus</li>
                        <li>Magnus</li>
                        <li>от 185 грн./м2</li>
                    </ul>

                </div>

            </div>
        </a>
    <?php } ?>
  <!-- -->
</div>
<!-- -->


