<?php
if ($type = 'ph') {
  echo "|  id   | id node | node name | node address| record_time | ph <br>";
  foreach ($list as $item) {
    echo "| ".$item->id."| ".$item->id_node."| ".$item->node_name."| ".$item->node_address."| ".$item->record_time."| ".$item->ph." <br>";
  }
} else if ($type = 'temp') {
  echo "|  id   | id node | node name | node address| record_time | ph <br>";
  foreach ($list as $item) {
    echo "| ".$item->id."| ".$item->id_node."| ".$item->node_name."| ".$item->node_address."| ".$item->record_time."| ".$item->temp." <br>";
  }
}
 ?>
