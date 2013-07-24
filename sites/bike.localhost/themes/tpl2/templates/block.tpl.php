<?php $tag = $block->subject ? 'section' : 'div'; ?>
<<?php print $tag; ?><?php print $attributes; ?>>
  <div class="block-inner clearfix">
    <?php print render($title_prefix); ?>
    <?php if ($block->subject): ?>
      <h2<?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    
    <div<?php print $content_attributes; ?>>
      <?php 
        if($block->delta == 'calendar-events' || $block->delta == 'temple-news') {
          $xml_str = file_get_contents($elements['bean'][$block->delta]['#entity']->field_rss_feed_url['und'][0]['url']);
          $xml = simplexml_load_string($xml_str);
          $items = $xml->channel->xpath('item');
          $num_stories = $elements['bean'][$block->delta]['#entity']->field_number_of_stories['und'][0]['value'] + 1;
          $counter = 0;
          $output = "<ul class='menu'>";
          foreach($items as $item) {
              $counter++;
              if($counter < $num_stories) {
                $itemTitle = $item->title;

                if($charPos = stripos($itemTitle, '(')) {
                  $charPos = $charPos - 1;
                  $itemTitle = substr_replace($itemTitle, '', $charPos);
                }

                if(strlen($itemTitle) > 60) {
                  if($lastSpace = strpos($itemTitle, ' ', 60)) {
                    $itemTitle = substr_replace($itemTitle, ' ...', $lastSpace);
                  } else {
                    $itemTitle = substr_replace($itemTitle, ' ...', 60);
                  }
                }

                $pubDate = strtotime($item->pubDate);
                $pubDate = strftime("%A, %B %d, %Y", $pubDate);

                $output .= "<li class='views-row views-row-".$counter."'>";
                $output .= "<a href='".$item->link."' title='".$itemTitle."'>".$itemTitle."</a><br />";
                $output .= "<span>".$pubDate."</span>";
                $output .= "</li>";
              }
          }
          $output .= "</ul>";
          echo $output;
          }
      ?>
      <?php print $content ?>
    </div>
  </div>
</<?php print $tag; ?>>