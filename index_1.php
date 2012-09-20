<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PHP testing page</title>
    </head>
    <body>
        <?php
            echo "test";
            $BDirect_metalArray = array ('American Eagle Gold Coin (0.100 oz.)',
            'American Eagle Gold Coin (1.000 oz.)',
            'Bullion Gold Bar .999+ Pure - CMX (Sealed) (1.000 oz.)',
            'S. African Krugerrand Gold Coin (0.100 oz.)',
            'S. African Krugerrand Gold Coin (1.000 oz.)',
            'Palladium - Bullion .999+ Pure CMX (1.000 oz.)',
            'American Eagle Silver Coin (1.000 oz.)',
            'Silver - Bullion .999 pure [Bars/Rounds] (1.000 oz.)',
            'Silver - Bullion .999 pure [Bars/Rounds] - CMX (1.000 oz.)',
            'Silver - Bullion .999 pure [Bar] (10.000 oz.)',
            'Silver - Bullion .999 pure [Bar] - CMX (10.000 oz.)',
            'Silver - Bullion .999 pure [Bar] - Engelhard (100.000 oz.)',
            'Canadian Maple Leaf Silver Coin (1.000 oz.)'
            );
            echo $BDirect_metalArray;
            echo $BDirect_metalArray[0];
            $page = '';
            $today = date("m_d_y_H_i");
            #$date = date('Format String');
            $BDirect_tempFile = "/Users/mbp12/Documents/BDirecttempFile".$today;
            $url = "http://www.bulliondirect.com/nucleo.do";
            $raw = file_get_contents($url);
            $newlines = array("\t","\n","\r","\x20\x20","\0","\x0B");
            $content = str_replace($newlines, "", html_entity_decode($raw));
            
            
            $stringStartPos = strpos($content, "<tbody>");
            $stringEndPos = strpos($content, "</tbody>"); #$stringStartPos + 300;
            $stringOffset = $stringEndPos - $stringStartPos;
            echo $stringStartPos."Start";
            echo $stringEndPos."End";
            $content2 = substr($content, $stringStartPos, $stringOffset);
            echo $content2;
            #echo $content;
            $tempFILE = fopen($BDirect_tempFile,'w');
            fwrite($tempFILE, $content2);
            fclose($tempFILE);
            
            $MetalNameStart = 'shadow">';
            $MetalNameEnd = ')>';
            
            #function striper($begin, $end){
            #$file = file_get_contents($BDirect_tempFile, "r");
            /*
             * METAL NAME
            Start Delimeter for metal name = "shadow">"
            End Delimeter for metal name = the following )<
             
            ASK PRICE
            Start Delimeter first occurence of "$"
            End Delimeter first occurence of "</" after $
             * 
             * 
             */
            

        ?>
    </body>
</html>
