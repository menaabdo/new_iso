<?php


if (!function_exists('getTypeSop')) {

function getTypeSop($type)
{
    switch ($type) {
        case 1:
            $content = trans('main.quality objectives');
            break;
        case 2:
            $content = trans('main.Risk assessment1');
            break;
        case 3:
            $content = trans('main.internal audit1');
            break;
        case 4:
            $content =trans('main.Management review1');
            break;
        case 5:
            $content = trans('main.Document control');
            break;
        case 6:
            $content = trans('main.Corrective and preventive actions and cases of non-conformity');
            break;
        case 7 :
            $content =  trans('main.Organization Context');
            break;
        case 8:
            $content =  trans('main.Measuring customer satisfaction');
            break;
        case 9:
            $content = trans('main.Change control');
            break;
        case 10:
            $content = trans('main.Improvement');
            break;
        default:
            $content  = '';
            break;
    }

    return $content;
}
};
?>