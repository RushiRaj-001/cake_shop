<?= $this->extend('public_layout') ?>
<?= $this->section('content') ?>

<section class="bg-#fff text-dark    text-center text-sm-start" style="margin-top: 4px;">


    <div class= "text-center" style="
    
    display: grid;
    grid-template-columns: repeat(4, 340px);
    gap: 10px;
    margin-top: 10px;
    margin: 20px;

">
        <div class="grid-item ">

            <div class="container-fluid text-dark  py-3   shadow text-black page-wrapper" style=" border-radius: 15px;">
            <?php foreach($products as $item) : ?>
                <div class="page-inner">
                    <div class="row">
                        <div class="el-wrapper">
                            <div class="box-up">
                                <a class="text-dark" href="userdash/bookinfo/AK075">
                                    <img class="img px-2 pt-1 pb-2 " src="<?=base_url()?>/public/uploads/<?=$item['prod_image']?>"
                                        width="180px" height="230px" alt="book poster"></a><br>
                                <div class="img-info">
                                    <div class="info-inner">
                                        <a class="text-dark text-decoration-none font-weight-bold"
                                            href="bookinfo/AK075">
                                            <h5 class="p-name font-weight-bold pt-1 notranslate text-decoration-none">
                                            <?=$item['prod_name']?>   </h5>
                                        </a>
                                       
                                    </div>
                                    <!-- <div class="a-size">Available sizes : <span class="size">S , M , L , XL</span></div> -->
                                </div>

                            </div>
                            <div class="py-2 " style="text-align: center;">
                                <h6><b>90₹</b>&nbsp;<span
                                        style="text-decoration: line-through; color:#818181; "><?=$item['prod_']?></h6>

                            </div>
                            <div class="box-down">

                                <div class="h-bg">
                                    <div class="h-bg-inner"></div>
                                    <form id="cartform98">
                                        <input type="hidden" name="bookid" value="AK075">
                                        <input type="hidden" name="bookname" value="क्वेशन इन माइंड...">
                                        <input type="hidden" name="poster" value="75-min.jpg">
                                        <input type="hidden" name="price" value="100">
                                        <input type="hidden" name="discount_price" value="90">
                                        <input type="hidden" name="discount" value="10">
                                        <input type="hidden" name="author" value="उषा महाजन">
                                        <input type="hidden" name="email" value=" rushirajapure111@gmail.com">
                                        <button class="cart-button font-weight-normal" id="submitButtonId98">
                                            <span class="add-to-cart">Add To Cart</span>
                                            <span class="added">Added</span>
                                            <i class="fas fa-shopping-cart"></i>
                                            <i class="fas fa-box"></i>
                                        </button>
                                        <!-- <a class="cart" >
                     </form>
                                </div>
                                          <form action="https://aksharbandha.com//shopbooks" method="get">      -->
                                        <!-- <button type="submit" class="cart-button font-weight-normal">--> -->
                                <!--  <span class="add-to-cart">Add To Cart</span>-->
                                <!--  <span class="added">Added</span>-->
                                <!--  <i class="fas fa-shopping-cart"></i>-->
                                <!--  <i class="fas fa-box"></i>-->
                                <!--</button>-->
                                <!--    </form>-->

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
       

        </div>

        <!-- <script>
            $("#submitButtonId98").click(function () {

                var url = "https://aksharbandha.com/addcart"; // the script where you handle the form input.

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#cartform98").serialize(), // serializes the form's elements.

                    success: function (data) {

                        //  alert(data); // show response from the php script.
                        count()
                    }
                });

                return false; // avoid to execute the actual submit of the form.
            });
        </script> -->
    </div>      





</section>
<?= $this->endSection() ?>