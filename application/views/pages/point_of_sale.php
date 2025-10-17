<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Point of Sale</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-7">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-th-list"></i> Item List</h2>

                    <div style="float:right;">
                        <a href="#" class="btn btn-setting btn-round btn-primary btn-sm"><i
                                class="glyphicon glyphicon-plus"></i> New Transaction</a>                        
                        <a href="#" class="btn btn-danger btn-round btn-sm"><i
                                class="glyphicon glyphicon-remove"></i> Cancel Transaction</a>
                    </div>
                </div>
                <div class="box-content">
                     <ul class="nav nav-tabs" id="myTab">
                        <?php
                            foreach($category as $cat){
                        ?>
                        <li><a href="#<?=$cat['category'];?>"><?=$cat['category'];?></a></li>                       
                        <?php
                            }
                            ?>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <?php                        
                            foreach($category as $cat){
                            
                        ?>                       
                        <div class="tab-pane" id="<?=$cat['category'];?>">                                                        
                            <table width="100%" border="0">
                                <tr>
                                <?php
                                    $x=1;
                                    $items=$this->Sales_model->getItemByCategory($cat['category']);
                                    foreach($items as $item){
                                ?>
                                <td style="text-align:center;" width="100">
                                    <a href="<?=base_url('add_item');?>" style="text-decoration:none; color:black;">
                                    <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['img']);?>" alt="Item" width="100"><br>                            
                                    <?=$item['description'];?><br>P <?=number_format($item['sellingprice'],2);?><br>Quantity: <?=$item['quantity'];?>                                    
                                    </a>
                                </td>
                                <?php
                                if($x > 5){echo "</tr>";}
                                $x++;
                                    }
                                ?>  
                                </tr>      
                            </table> 
                        </div>  
                        <?php
                            }
                            ?>                 
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box col-md-5">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-th-list"></i> Item List</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        
                    </div>                    
                </div>
            </div>
        </div>
        <!--/span-->

</div><!--/row-->