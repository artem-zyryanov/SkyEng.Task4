<?php

namespace SkyEng;

class BigNumber
{
    public static function Sum(string $a, string $b): string
    {
        if ($a === '0') {
            return $b;
        }
        if ($b === '0') {
            return $a;
        }
        $aNegative = $a[0] === '-';
        $bNegative = $b[0] === '-';

        $aDigits = $aNegative ? substr($a, 1) : $a;
        $bDigits = $bNegative ? substr($b, 1) : $b;

        $result = $aNegative === $bNegative ? self::innerSum($aDigits, $bDigits) : self::innerSub($aDigits, $bDigits);
        if ($aNegative && $result !== '0') {

            if ($result[0] === '-') {
                return substr($result, 1);
            }
            return '-' . $result;
        }
        return $result;
    }

    private static function innerSum($aDigits, $bDigits): string
    {
        $aStrLen = strlen($aDigits);
        $bStrLen = strlen($bDigits);
        $maxLen = max($aStrLen, $bStrLen);
        $result = str_pad("", $maxLen + 1);
        $mod = "0";
        for ($i = 1; $i <= $maxLen; $i++) {

            $x = $aStrLen >= $i ? $aDigits[-$i] : 0;
            $y = $bStrLen >= $i ? $bDigits[-$i] : 0;
            $sum = strval($x + $y + $mod);
            if (strlen($sum) == 2) {
                $mod = $sum[0];
                $sum = $sum[1];
            } else {
                $mod = "0";
            }
            $result[-$i] = $sum;
        }
        if ($mod != "0") {
            $result[0] = $mod;
        }
        return trim($result);
    }

    private static function innerSub($aDigits, $bDigits): string
    {
        if ($aDigits === $bDigits) {
            return "0";
        }
        $aStrLen = strlen($aDigits);
        $bStrLen = strlen($bDigits);
        $maxLen = max($aStrLen, $bStrLen);
        $negativeResult = str_pad($aDigits, $maxLen, "0", STR_PAD_LEFT) < str_pad($bDigits, $maxLen, "0", STR_PAD_LEFT);
        if ($negativeResult) {
            $t = $aDigits;
            $aDigits = $bDigits;
            $bDigits = $t;

            $t = $aStrLen;
            $aStrLen = $bStrLen;
            $bStrLen = $t;
        }

        $result = str_pad("", $maxLen + 1);
        $mod = 0;
        for ($i = 1; $i <= $maxLen; $i++) {

            $x = $aStrLen >= $i ? $aDigits[-$i] : 0;
            $y = $bStrLen >= $i ? $bDigits[-$i] : 0;
            $sum = $x - $y - $mod;
            if ($sum < 0) {
                $mod = 1;
                $sum = $sum + 10;
            } else {
                $mod = 0;
            }
            $result[-$i] = strval($sum);
        }

        $result = trim($result);

        return $negativeResult ? '-' . $result : $result;
    }
}