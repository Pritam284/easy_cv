<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 1/20/19
 * Time: 6:00 PM
 */

namespace common\helpers;


use kartik\mpdf\Pdf;

class PdfHelper
{
    public static function test($content){
//        $content = $description;

        $fileName='asd'.'.pdf';

        $title = 'title';

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
//            'title' => $title,
            'content' => $content,
            'filename' => $fileName,
        ]);

        return $pdf->render();
    }

}