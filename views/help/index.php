<?php
        for ($randomNumber = mt_rand(1, 6), $i = 1; $i < 6; $i++) {
                $randomNumber .= mt_rand(0, 6);
              }
              echo " $randomNumber";
?>