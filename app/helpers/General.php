<?php

class General {
    public static function giveStars($rating)
    {
        $nos = explode('.', $rating);
        $html = '';
        for ($i = 0; $i < $nos[0]; $i++)
        {
            $html .= '<i class="fa fa-star golden"></i>';
        }
        if ($nos[0] > 0)
        {
            $html .= '<i class="fa fa-star-half-o golden"></i>';
            $i++;
        }
        for ($j = $i; $j < 5; $j++)
        {
            $html .= '<i class="fa fa-star-o"></i>';
        }

        return $html;
    }

    public static function commafy($parts){
        $str='';
        for($i=0;$i<count($parts);$i++){
            $str .= $parts[$i];
            if($i<count($parts)-1&&$parts[$i]<>''){
                $str .= ', ';
            }
        }
       return $str;

    }
    public static function extLink($href,$title=false){
        if($href){
            $html ='<i class="fa fa-external-link"></i> ';
            if($title){ $html .=  '<a href="'.$href.'" target="_blank" style="color:#006699">' . $title. '</a>';} else { $html .= '<a href="'.$href.'" target="_blank" style="color:#006699">' . $href. '</a>'; }

            return $html;
        }
    }


    public function specialization() {

        
    }
}