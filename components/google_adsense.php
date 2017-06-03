<?php
    if (!$is_demo) {
        if ($mobile_detector->isMobile()) {
            echo '
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Mobile Banner -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:320px;height:50px"
                 data-ad-client="ca-pub-2031179174794311"
                 data-ad-slot="3880311839"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>';
        } else {
            echo '
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Default Ad -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-2031179174794311"
                 data-ad-slot="3693145434"
                 data-ad-format="auto"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>';
        }
    }
?>
