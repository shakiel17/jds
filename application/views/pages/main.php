
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
        </ul>
</div>
<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-calendar"></i> Calendar</h2>

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
                    <?php
                    $datetime=$year."-".$month;
                    if($month==date('m') && $year==date('Y')){
                        $previous="disabled";
                    }else{
                        $previous="";
                    }
                    $nextmonth=date('m',strtotime('1 month',strtotime($datetime)));
                    $nextyear=date('Y',strtotime($datetime));
                    $prevmonth=date('m',strtotime('-1 month',strtotime($datetime)));
                    $prevyear=date('Y',strtotime($datetime));
                    ?>
                    <!-- <div id="calendar"></div> -->
                <table class="table table-bordered" width="100%">

                  <tr style="background-color: greenyellow;">
                    <!-- <td colspan="2" align="center" style="border-right:0;">
                      
                    </td> -->
                    <td align="center" colspan="7">
                      <h4 align="center"><b><?=date('F',strtotime($datetime));?> <?=$year;?></b></h4>
                    </td>
                    <!-- <td colspan="2" align="right" style="border-left:0;">
                      
                    </td> -->
                  </tr>

                    <tr>

                      <td align="center" style="background-color:red; color:white;"><b>SUN</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>MON</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>TUE</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>WED</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>THU</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>FRI</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>SAT</b></td>

                    </tr>

                    <?php
                    $w=0;                    
                    $color="";
                    for($i=1;$i<=date('t',strtotime($datetime));$i++){

                      $date=date('Y-m-d',strtotime($datetime."-".$i));                      

                      if($i==1){

                        for($x=0;$x<7;$x++){

                            if(date('w',strtotime($date))==$x){                              

                             echo "<td style='$color' align='center' style='width:50px;height:100px;'><b style='float:center; font-size:1vw;'>$i</b></td>";                                 

                                $w++;

                                break;                                                                                                                                                     

                            }else{

                                echo "<td style='background-color:gray;'>&nbsp;</td>";

                                $w++;

                            }

                           

                       }

                    }else{                      

                        echo "<td style='$color' align='center' style='width:50px;height:50px;'><b style='float:center; font-size:1vw;'>$i</b></td>"; 

                        $w++;

                    }

                                                               

                   

                    if($w > 6){

                        $w=0;

                        echo "</tr>";

                    }

                    }

                    ?>

                </table>
                <ul class="pagination pagination-centered">
                        <li>
                            <!-- <a href="#">Prev</a> -->
                             <?=form_open(base_url('main'));?>
                            <input type="text" name="month" value="<?=$prevmonth;?>">
                            <input type="text" name="year" value="<?=$prevyear;?>">
                            <button type="submit" class="btn btn-primary btn-sm" <?=$previous;?>><< Previous</button>
                            <?=form_close();?>
                        </li>
                        <li>
                            <?=form_open(base_url('main'));?>
                            <input type="text" name="month" value="<?=$nextmonth;?>">
                            <input type="text" name="year" value="<?=$nextyear;?>">
                            <button type="submit" class="btn btn-primary btn-sm">Next >></button>
                            <?=form_close();?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--/row-->