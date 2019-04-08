<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([]);
    }
    public function show($number)
    {
        $words = array(
            900=>'девятьсот',
            800=>'восемьсот',
            700=>'семьсот',
            600=>'шестьсот',
            500=>'пятьсот',
            400=>'четыреста',
            300=>'триста',
            200=>'двести',
            100=>'сто',
            90=>'девяносто',
            80=>'восемьдесят',
            70=>'семьдесят',
            60=>'шестьдесят',
            50=>'пятьдесят',
            40=>'сорок',
            30=>'тридцать',
            20=>'двадцать',
            19=>'девятнадцать',
            18=>'восемнадцать',
            17=>'семнадцать',
            16=>'шестнадцать',
            15=>'пятнадцать',
            14=>'четырнадцать',
            13=>'тринадцать',
            12=>'двенадцать',
            11=>'одиннадцать',
            10=>'десять',
            9=>'девять',
            8=>'восемь',
            7=>'семь',
            6=>'шесть',
            5=>'пять',
            4>'четыре',
            3=>'три',
            2=>'два',
            1=>'один',
        );

        $level=array(
            4=>array('миллиард', 'миллиарда', 'миллиардов'),
            3=>array('миллион', 'миллиона', 'миллионов'),
            2=>array('тысяча', 'тысячи', 'тысяч'),
        );

        $parts=explode(',',number_format($n,2));

        for($str='', $l=count($parts), $i=0; $i<count($parts); $i++, $l--) {
            if (intval($num=$parts[$i])) {
                foreach($words as $key=>$value) {
                    if ($num>=$key) {
                        if ($l==2 && $key==1) {
                            $value='одна';
                        }
                        if ($l==2 && $key==2) {
                            $value='две';
                        }
                        $str.=($str!=''?' ':'').$value;
                        $num-=$key;
                    }
                }
                if (isset($level[$l])) {
                    $str.=' '.($level[$l][($parts[$i]=($parts[$i]=$parts[$i]%100)>19?($parts[$i]%10):$parts[$i])==1?0 : (($parts[$i]>1&&$parts[$i]<=4)?1:2)]);
                }
            }
        }
        return response()->json([
    			"number" => substr($str,0,1).substr($str,1,strlen($str)),
    		]);
    }
    public function math($a, $b, $c)
    {
  		$answer = true;
  		if ($a==0)
  			$answer = false;
  		if ($b==0) {
  			if ($c<0) {
  				$x1 = sqrt(abs($c/$a));
  				$x2 = sqrt(abs($c/$a));
  			} elseif ($c==0) {
  				$x1 = $x2 = 0;
  			} else {
  				$x1 = sqrt($c/$a).'i';
  				$x2 = -sqrt($c/$a).'i';
  			}
  		} else {
  			$d = $b*$b-4*$a*$c;
  			if ($d>0) {
  				$x1 = (-$b+sqrt($d))/2*$a;
  				$x2 = (-$b-sqrt($d))/2*$a;
  			} elseif ($d==0) {
  				$x1 = $x2 = (-$b)/2*$a;
  			} else {
  				$x1 = -$b . '+' . sqrt(abs($d)) . 'i';
  				$x2 = -$b . '-' . sqrt(abs($d)) . 'i';
  			}
  		}
  		if($answer)
  			$answer = [
  				'x1' => $x1,
  				'x2' => $x2,
  			];
          return response()->json([
  			"answer" => $answer,
  		]);
    }
    public function date($date)
    {
  		if(preg_match('~^\\d{1,2}\\.\\d{1,2}\\.\\d{4}$~', $date))
  		{
  			$time = strtotime($date);
  			return response()->json([
  				"day" => date("l", $time),
  			]);
  		}
  		else
  			return response()->json([
  				"day" => "invalid date",
  			]);
    }

}
