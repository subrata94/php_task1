<?php $size = count($data); ?>          
  <table class="table table-bordered">
    <thead class="text-center">
      <tr>
        <th class="text-center" colspan="<?php echo $size; ?>">Marks</th>
      </tr>
    </thead>
    <tbody class="text-center">
        <?php 
            $col=array();
            $val=array();
            $i=0;
            foreach($data as $d){
                $v=explode("|",$d);
                array_push($col,$v[0]);
                array_push($val,$v[1]);
            }
        ?> 
        <tr>
            <?php
                foreach($col as $c){
                    if($c != NULL || $c != "")
                    echo "<th class=\"text-center\">{$c}</th>";
                }
            ?>
        </tr>
        <tr>
            <?php
                foreach($val as $vv){
                    if($vv != NULL || $vv != "")
                    echo "<td>{$vv}</td>";
                }
            ?>
        </tr>
    </tbody>
  </table>

