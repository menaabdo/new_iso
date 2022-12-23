<?php


if (!function_exists('getTypeSop')) {

function getTypeSop($type)
{
    switch ($type) {
        case 1:
            $content = "إجراء أهداف الجوده";
            break;
        case 2:
            $content = "إجراء تقيم المخاطر";
            break;
        case 3:
            $content = "إجراء المراجعه الداخليه";
            break;
        case 4:
            $content ="إجراء مراجعه الأدارة";
            break;
        case 5:
            $content = "إجراء مراقبة وضبط الوثائق";
            break;
        case 6:
            $content = "إجراء التصحيحيه والوقائيه";
            break;
        case 7 :
            $content = "إجراء فهم المنظمه وسياقها";
            break;
        case 8:
            $content = "إجراء عمل الشكاوي وقياس رضا العميل";
            break;
        case 9:
            $content = "إجراء التحكم في التغيير";
            break;
        case 10:
            $content = "إجراء التحسين المستمر";
            break;
        default:
            $content  = '';
            break;
    }

    return $content;
}
};
?>